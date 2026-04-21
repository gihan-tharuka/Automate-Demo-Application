<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Invoice;
use PDF;

class InvoiceReportController extends Controller
{
    public function pdf(Request $request)
    {
        $query = Invoice::with('user', 'items');

        // Advanced filters
        if ($request->filled('from')) {
            $query->whereDate('date', '>=', $request->input('from'));
        }
        if ($request->filled('to')) {
            $query->whereDate('date', '<=', $request->input('to'));
        }
        if ($request->filled('status')) {
            $query->where('status', $request->input('status'));
        }
        if ($request->filled('min_total')) {
            $query->where('total', '>=', $request->input('min_total'));
        }
        if ($request->filled('max_total')) {
            $query->where('total', '<=', $request->input('max_total'));
        }

        $invoices = $query->get();

        $pdf = PDF::loadView('filament.pages.invoice-report-pdf', compact('invoices'));
        return $pdf->download('invoice-report.pdf');
    }
}
