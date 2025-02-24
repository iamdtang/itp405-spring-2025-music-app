<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\Invoice;

class InvoiceController extends Controller
{
    public function index()
    {
        $invoices = Invoice::with(['customer'])->get();

        return view('invoices.index', [
            'invoices' => $invoices,
            'invoiceCount' => count($invoices),
        ]);
    }

    public function show($invoiceId)
    {
        $invoice = DB::table('invoices')
            ->where('InvoiceId', '=', $invoiceId)
            ->first();

        return view('invoices.show', [
            'invoice' => $invoice,
        ]);
    }
}