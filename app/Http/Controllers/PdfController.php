<?php

namespace App\Http\Controllers;

use App\Models\Invoice;
use Carbon\Carbon;
use Spatie\LaravelPdf\Enums\Unit;
use function Spatie\LaravelPdf\Support\pdf;

class PdfController extends Controller
{
    public function index()
    {
        $invoices = Invoice::limit(1000)->get();

        foreach ($invoices as $invoice) {
            $invoice->items = json_decode($invoice->items, true);
        }

        return pdf()
            ->margins(32, 32, 32, 32, Unit::Pixel)
            ->format('a4')
            ->view('pdf.invoices', compact('invoices'))
            ->name('invoices-'. now()->format('Y-m-d H:i:s') .'.pdf');
    }

    public function show(Invoice $invoice)
    {            
        $invoice->items = json_decode($invoice->items, true);

        return pdf()
            ->margins(32, 32, 32, 32, Unit::Pixel)
            ->format('a4')
            ->view('pdf.invoice', compact('invoice'))
            ->name('invoice-'. now()->format('Y-m-d H:i:s') .'.pdf');
    }
}
