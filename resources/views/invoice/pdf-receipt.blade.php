<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Invoice Receipt #{{ $invoice->id }}</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            font-size: 12px;
            line-height: 1.5;
            margin: 0;
            padding: 20px;
        }
        .header {
            text-align: center;
            margin-bottom: 20px;
        }
        h1 {
            font-size: 22px;
            color: #1a365d;
            margin-bottom: 15px;
        }
        .info {
            margin-bottom: 20px;
        }
        .info-row {
            display: flex;
            justify-content: space-between;
            margin-bottom: 5px;
        }
        .label {
            font-weight: bold;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }
        table, th, td {
            border: 1px solid #ddd;
        }
        th {
            background-color: #e6f0ff;
            text-align: left;
            padding: 8px;
        }
        td {
            padding: 8px;
        }
        .text-right {
            text-align: right;
        }
        .totals {
            width: 300px;
            margin-left: auto;
        }
        .total-row {
            display: flex;
            justify-content: space-between;
            margin-bottom: 5px;
        }
        .grand-total {
            font-size: 16px;
            font-weight: bold;
            margin-top: 10px;
        }
    </style>
</head>
<body>
    <div class="header">
        <h1>Invoice Receipt</h1>
    </div>
    
    <div class="info">
        <div class="info-row">
            <span class="label">Invoice #:</span>
            <span>{{ $invoice->id }}</span>
        </div>
        <div class="info-row">
            <span class="label">Date:</span>
            <span>{{ $invoice->date }}</span>
        </div>
        <div class="info-row">
            <span class="label">Customer:</span>
            <span>{{ $invoice->user->name ?? '-' }}</span>
        </div>
        <div class="info-row">
            <span class="label">Vehicle:</span>
            <span>{{ $invoice->vehicle_number }}</span>
        </div>
    </div>
    
    <table>
        <thead>
            <tr>
                <th>Item</th>
                <th class="text-right">Qty</th>
                <th class="text-right">Price</th>
                <th class="text-right">Total</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($invoice->items as $item)
                <tr>
                    <td>{{ $item->type === 'part' ? ($item->product->name ?? '-') : $item->service_name }}</td>
                    <td class="text-right">{{ $item->quantity }}</td>
                    <td class="text-right">{{ number_format($item->price, 2) }}</td>
                    <td class="text-right">{{ number_format($item->total, 2) }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
    
    <div class="totals">
        <div class="total-row">
            <span class="label">Subtotal:</span>
            <span>{{ number_format($invoice->subtotal, 2) }}</span>
        </div>
        <div class="total-row">
            <span class="label">VAT:</span>
            <span>{{ number_format($invoice->vat_amount, 2) }}</span>
        </div>
        <div class="total-row grand-total">
            <span>Total:</span>
            <span>{{ number_format($invoice->total, 2) }}</span>
        </div>
    </div>
</body>
</html>