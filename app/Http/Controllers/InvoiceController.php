<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class InvoiceController extends Controller
{
    public function index()
    {
        $invoices = DB::table('invoices')
            ->join('customers', 'invoices.CustomerId', '=', 'customers.CustomerId')
            ->orderBy('invoices.InvoiceDate', 'DESC')
            ->get();
        // dd($invoices);

        return view('invoices/index', [
            'invoices' => $invoices,
            'invoiceCount' => count($invoices),
        ]);
    }
}