<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Invoices</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            color: #333;
            margin: 20px; /* Adjust the margin of the page */
        }
        .invoice-section {
            page-break-inside: avoid; /* Avoid breaking an invoice across pages */
            border: 1px solid #ddd;
            padding: 15px;
            margin-bottom: 20px; /* Space between invoices */
        }
        .header {
            display: flex;
            justify-content: space-between;
            margin-bottom: 20px; /* Space between header and content */
        }
        .header h1 {
            margin: 0;
            font-size: 24px;
        }
        .header-date {
            text-align: right;
            white-space: nowrap;
        }
        .items {
            display: flex;
            flex-direction: column;
            margin-bottom: 20px;
        }
        .item {
            display: flex;
            justify-content: space-between;
            margin-bottom: 10px; /* Space between items */
        }
        .item:last-child {
            margin-bottom: 0;
        }
        .item div {
            flex-basis: 20%; /* Adjust the width of each item block */
            text-align: left;
        }
        .item div:first-child {
            flex-basis: 40%; /* Description might need more space */
        }
        .total-amount {
            text-align: right;
            font-size: 18px;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <div class="invoices-container">
        @foreach ($invoices as $invoice)
            <div class="invoice-section">
                <div class="header">
                    <h1>Invoice: {{ $invoice->number }}</h1>
                    <div class="header-date">
                        <p>Date: {{ $invoice->date }}</p>
                    </div>
                </div>
                <div class="items">
                    @foreach ($invoice->items as $item)
                        <div class="item">
                            <div>{{ $item['description'] }}</div>
                            <div>{{ $item['quantity'] }}</div>
                            <div>{{ $item['price'] }}</div>
                            <div>{{ $item['total'] }}</div>
                        </div>
                    @endforeach
                </div>
                <div class="total-amount">
                    Total Amount: {{ $invoice->totalAmount }}
                </div>
            </div>
        @endforeach
    </div>
</body>
</html>