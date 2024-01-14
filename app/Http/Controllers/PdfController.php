<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Invoice;
use function Spatie\LaravelPdf\Support\pdf;

class PdfController extends Controller
{
    public function __invoke(Invoice $invoice)
    {        

        $now = Carbon::now()->format('Y-m-d H:i:s');

        return pdf()
        ->setNodeBinary('/usr/bin/node')
            ->view('pdf.invoice', compact('invoice'))
            ->name('invoice-2023-04-10.pdf');
    }
}
