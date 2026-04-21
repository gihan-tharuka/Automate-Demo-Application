<?php
namespace App\Http\Controllers;

use App\Models\Invoice;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class InvoiceReceiptController extends Controller
{
    public function show($invoice)
    {
        $invoice = Invoice::with(['user', 'items.product'])->findOrFail($invoice);
        return view('invoice.receipt', compact('invoice'));
    }

        public function downloadPdf($invoice)
    {
        $invoice = Invoice::with(['user', 'items.product'])->findOrFail($invoice);
        $pdf = Pdf::loadView('invoice.pdf-receipt', compact('invoice'));
        
        // Set paper size and orientation
        $pdf->setPaper('a4', 'portrait');
        
        // Set other options if needed
        $pdf->setOptions([
            'isHtml5ParserEnabled' => true,
            'isRemoteEnabled' => true,
            'defaultFont' => 'sans-serif'
        ]);
        
        return $pdf->download('invoice_receipt_' . $invoice->id . '.pdf');
    }
}
