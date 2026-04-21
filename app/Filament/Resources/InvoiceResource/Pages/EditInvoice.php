<?php

namespace App\Filament\Resources\InvoiceResource\Pages;

use App\Filament\Resources\InvoiceResource;
use App\Models\Invoice;
use App\Models\Product;
use Filament\Resources\Pages\EditRecord;

class EditInvoice extends EditRecord
{
    protected static string $resource = InvoiceResource::class;
    
    protected function authorizeAccess(): void
    {
        parent::authorizeAccess();
        
        $user = auth()->user();
        
        // Only admin users can edit invoices
        if (!$user->isAdmin()) {
            abort(403);
        }
    }
    
    protected function mutateFormDataBeforeSave(array $data): array
    {
        // Set user_id from vehicle_number if it was changed
        if (isset($data['vehicle_number'])) {
            $vehicle = \App\Models\Vehicle::where('license_plate', $data['vehicle_number'])->first();
            if ($vehicle) {
                $data['user_id'] = $vehicle->user_id;
            }
        }
        
        return $data;
    }
    
    protected function afterSave(): void
    {
        /** @var Invoice $invoice */
        $invoice = $this->record;

        // Ensure relationship is loaded
        $invoice->load('items');

        $subtotal = 0;
        $vat = 0;

        foreach ($invoice->items as $item) {
            $itemTotal = $item->quantity * $item->price;
            $subtotal += $itemTotal;

            if ($item->type === 'service') {
                $vat += $itemTotal * 0.18;
            }
        }

        // Update invoice totals without triggering observers
        $invoice->subtotal = $subtotal;
        $invoice->vat_amount = $vat;
        $invoice->total = $subtotal + $vat;
        $invoice->saveQuietly();

        // Sync Income and Transaction records based on invoice status
        $existingIncome = \App\Models\Income::where('invoice_id', $invoice->id)->first();
        $existingTransaction = \App\Models\Transaction::where('reference_number', 'INV-' . $invoice->id)->first();
        $category = 'Mixed (Parts & Service)';

        if ($invoice->status === 'paid' && $invoice->total > 0) {
            // Create or update income record
            if ($existingIncome) {
                $existingIncome->update([
                    'amount' => $invoice->total,
                    'date' => $invoice->date,
                    'source' => 'Invoice #' . $invoice->id,
                    'description' => 'Auto-generated from Invoice #' . $invoice->id . ' for vehicle ' . $invoice->vehicle_number,
                    'payment_method' => $invoice->payment_method,
                ]);
            } else {
                \App\Models\Income::create([
                    'invoice_id' => $invoice->id,
                    'amount' => $invoice->total,
                    'date' => $invoice->date,
                    'category' => $category,
                    'source' => 'Invoice #' . $invoice->id,
                    'description' => 'Auto-generated from Invoice #' . $invoice->id . ' for vehicle ' . $invoice->vehicle_number,
                    'payment_method' => $invoice->payment_method,
                    'created_by' => auth()->id(),
                ]);
            }

            // Create or update transaction record
            if ($existingTransaction) {
                $existingTransaction->update([
                    'amount' => $invoice->total,
                    'date' => $invoice->date,
                    'description' => 'Invoice #' . $invoice->id . ' - Vehicle: ' . $invoice->vehicle_number,
                    'payment_method' => $invoice->payment_method,
                ]);
            } else {
                \App\Models\Transaction::create([
                    'type' => 'income',
                    'amount' => $invoice->total,
                    'date' => $invoice->date,
                    'category' => $category,
                    'description' => 'Invoice #' . $invoice->id . ' - Vehicle: ' . $invoice->vehicle_number,
                    'payment_method' => $invoice->payment_method,
                    'reference_number' => 'INV-' . $invoice->id,
                    'created_by' => auth()->id(),
                ]);
            }
        } else {
            // If status is not 'paid', delete any existing income and transaction records
            if ($existingIncome) {
                $existingIncome->delete();
            }
            if ($existingTransaction) {
                $existingTransaction->delete();
            }
        }
    }

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
