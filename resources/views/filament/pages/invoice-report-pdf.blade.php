<h1>Invoice Report</h1>
<table border="1" cellpadding="5" cellspacing="0" width="100%">
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
