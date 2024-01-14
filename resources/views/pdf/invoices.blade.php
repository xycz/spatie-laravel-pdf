<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Invoices</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            color: #333;
            margin: 0;
            padding: 0;
        }

        .container {
            width: 100%;
            margin: 0 auto;
            padding: 0 20px; /* Added padding to the left and right */
        }

        .content {
            margin-top: 20px;
        }

        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 10px 0;
        }

        .header-date {
            text-align: right;
        }

        .invoice-section {
            page-break-inside: avoid; /* Avoid breaking inside an invoice */
            break-inside: avoid; /* For modern browsers */
            margin-bottom: 20px; /* Adds spacing between invoices */
        }

        .content, .table {
            page-break-inside: avoid; /* Avoid breaking content and tables inside an invoice */
            break-inside: avoid; /* For modern browsers */
        }

        table {
            width: 100%;
            border-collapse: collapse;
            table-layout: fixed; /* Added for even column spacing */
        }

        table, th, td {
            border: 1px solid black;
        }

        th, td {
            padding: 10px;
            text-align: left;
        }

        th {
            text-align: left; /* Align headers to the left */
        }
    </style>
</head>
<body>
    <div class="container">
        @foreach ($invoices as $invoice)
            <div class="invoice-section">
                <div class="header">
                    <h1>Invoice: {{ $invoice->number }}</h1>
                    <div class="header-date">
                        <p>Date: {{ $invoice->date }}</p>
                    </div>
                </div>

                <div class="content">
                    <table>
                        <thead>
                            <tr>
                                <th>Items</th>
                                <th>Description</th>
                                <th>Quantity</th>
                                <th>Price</th>
                                <th>Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($invoice->items as $item)
                                <tr>
                                    <td>{{ $item['description'] }}</td>
                                    <td>{{ $item['quantity'] }}</td>
                                    <td>{{ $item['price'] }}</td>
                                    <td>{{ $item['total'] }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                    <h3>Total Amount: {{ $invoice->totalAmount }}</h3>
                </div>
            </div>
            <hr>
        @endforeach
    </div>
</body>
</html>