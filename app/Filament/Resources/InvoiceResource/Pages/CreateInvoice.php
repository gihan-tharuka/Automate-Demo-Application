<?php

namespace App\Filament\Resources\InvoiceResource\Pages;

use App\Filament\Resources\InvoiceResource;
use App\Models\Invoice;
use App\Models\Product;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Database\Eloquent\Model;

class CreateInvoice extends CreateRecord
{
    protected static string $resource = InvoiceResource::class;
    
    protected function authorizeAccess(): void
    {
        parent::authorizeAccess();
        
        // Only admin users can create invoices
        if (!auth()->user()->isAdmin()) {
            abort(403);
        }
    }
    
    protected function mutateFormDataBeforeCreate(array $data): array
    {
        $data['status'] = $data['status'] ?? 'pending';
        
        // Set user_id from vehicle_number
        if (isset($data['vehicle_number']) && !isset($data['user_id'])) {
            $vehicle = \App\Models\Vehicle::where('license_plate', $data['vehicle_number'])->first();
            if ($vehicle) {
                $data['user_id'] = $vehicle->user_id;
            }
        }
        
        return $data;
    }
    
    protected function afterCreate(): void
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

            // Reduce product stock for parts
            if ($item->type === 'part' && $item->product_id) {
                $product = Product::find($item->product_id);
                if ($product) {
                    $product->decrement('quantity', $item->quantity);
                }
            }
        }

        // Update invoice totals without triggering observers
        $invoice->subtotal = $subtotal;
        $invoice->vat_amount = $vat;
        $invoice->total = $subtotal + $vat;
        $invoice->saveQuietly();

        // Auto-create Income record if invoice status is 'paid'
        if ($invoice->status === 'paid' && $invoice->total > 0) {
            $category = 'Mixed (Parts & Service)';

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

            // Also create a transaction entry for the Financial Tracker
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
    }

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
