<?php

namespace App\Observers;

use App\Models\Invoice;
use App\Models\Income;
use App\Models\Transaction;

class InvoiceObserver
{
    /**
     * Handle the Invoice "created" event.
     */
    public function created(Invoice $invoice): void
    {
        $this->updateTotals($invoice);
    }

    /**
     * Handle the Invoice "updated" event.
     */
    public function updated(Invoice $invoice): void
    {
        $this->updateTotals($invoice);
        $this->handleIncomeTracking($invoice);
    }

    /**
     * Handle automatic income tracking when invoice is paid
     */
    private function handleIncomeTracking(Invoice $invoice): void
    {
        // Check if status changed to 'paid'
        if ($invoice->wasChanged('status')) {
            $oldStatus = $invoice->getOriginal('status');
            $newStatus = $invoice->status;

            // If invoice is now paid and wasn't before, create income entry
            if ($newStatus === 'paid' && $oldStatus !== 'paid') {
                // Check if income entry doesn't already exist
                $existingIncome = Income::where('invoice_id', $invoice->id)->first();

                if (!$existingIncome) {
                    // Determine income category based on invoice items
                    $invoice->load('items');
                    $hasServices = $invoice->items->contains('type', 'service');
                    $hasParts = $invoice->items->contains('type', 'part');

                    $category = 'Service Revenue';
                    if ($hasParts && !$hasServices) {
                        $category = 'Parts Sales';
                    } elseif ($hasParts && $hasServices) {
                        $category = 'Mixed (Parts & Service)';
                    }

                    // Create income entry
                    Income::create([
                        'amount' => $invoice->total,
                        'date' => $invoice->date,
                        'category' => $category,
                        'source' => "Invoice #{$invoice->id} - " . ($invoice->user ? $invoice->user->name : 'Customer'),
                        'description' => "Auto-generated from invoice #{$invoice->id} for vehicle {$invoice->vehicle_number}",
                        'payment_method' => $invoice->payment_method,
                        'invoice_id' => $invoice->id,
                        'created_by' => auth()->id() ?? 1, // Fallback to admin user
                    ]);

                    // Also create a transaction entry for the Financial Tracker
                    Transaction::create([
                        'type' => 'income',
                        'amount' => $invoice->total,
                        'date' => $invoice->date,
                        'category' => $category,
                        'description' => "Invoice #{$invoice->id} - " . ($invoice->user ? $invoice->user->name : 'Customer') . " - Vehicle: {$invoice->vehicle_number}",
                        'payment_method' => $invoice->payment_method,
                        'reference_number' => "INV-{$invoice->id}",
                        'created_by' => auth()->id() ?? 1,
                    ]);
                }
            }

            // If invoice was paid but now is cancelled or changed, delete income entry and transaction
            if ($oldStatus === 'paid' && $newStatus !== 'paid') {
                Income::where('invoice_id', $invoice->id)->delete();
                Transaction::where('reference_number', "INV-{$invoice->id}")->delete();
            }
        }
    }

    /**
     * Calculate and update invoice totals
     */
    private function updateTotals(Invoice $invoice): void
    {
        // Ensure relationship is loaded
        if (!$invoice->relationLoaded('items')) {
            $invoice->load('items');
        }

        $subtotal = 0;
        $vat = 0;

        foreach ($invoice->items as $item) {
            $itemTotal = $item->quantity * $item->price;
            $subtotal += $itemTotal;
            
            if ($item->type === 'service') {
                $vat += $itemTotal * 0.18;
            }
            
            // Reduce product stock for parts if needed
            if ($item->type === 'part' && $item->product) {
                $item->product->decrement('quantity', $item->quantity);
            }
        }
        
        // Update without triggering observers again
        Invoice::withoutEvents(function () use ($invoice, $subtotal, $vat) {
            $invoice->subtotal = $subtotal;
            $invoice->vat_amount = $vat;
            $invoice->total = $subtotal + $vat;
            $invoice->save();
        });
    }
}