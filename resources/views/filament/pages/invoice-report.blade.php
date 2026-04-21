@extends('filament::page')

@section('content')
    <h1 class="text-2xl font-bold mb-4">Invoice Report</h1>
    <form method="POST" action="{{ route('invoice.report.pdf') }}" class="mb-4 flex flex-wrap gap-2 items-end">
        @csrf
        <div>
            <label>From:</label>
            <input type="date" name="from" class="border rounded px-2 py-1" />
        </div>
        <div>
            <label>To:</label>
            <input type="date" name="to" class="border rounded px-2 py-1" />
        </div>
        <div>
            <label>Status:</label>
            <select name="status" class="border rounded px-2 py-1">
                <option value="">Any</option>
                <option value="draft">Draft</option>
                <option value="paid">Paid</option>
                <option value="cancelled">Cancelled</option>
            </select>
        </div>
        <div>
            <label>Min Total:</label>
            <input type="number" step="0.01" name="min_total" class="border rounded px-2 py-1" />
        </div>
        <div>
            <label>Max Total:</label>
            <input type="number" step="0.01" name="max_total" class="border rounded px-2 py-1" />
        </div>
        <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded">Export PDF</button>
    </form>
    <table class="min-w-full bg-white">
        <thead>
            <tr>
                <th>ID</th>
                <th>Vehicle Number</th>
                <th>Customer</th>
                <th>Date</th>
                <th>Status</th>
                <th>Subtotal</th>
                <th>VAT</th>
                <th>Total</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($invoices as $invoice)
                <tr>
                    <td>{{ $invoice->id }}</td>
                    <td>{{ $invoice->vehicle_number }}</td>
                    <td>{{ $invoice->user->name ?? '-' }}</td>
                    <td>{{ $invoice->date }}</td>
                    <td>{{ $invoice->status }}</td>
                    <td>{{ number_format($invoice->subtotal, 2) }}</td>
                    <td>{{ number_format($invoice->vat_amount, 2) }}</td>
                    <td>{{ number_format($invoice->total, 2) }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
