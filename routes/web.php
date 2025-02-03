<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/invoices', function () {
    $invoices = DB::table('invoices')
        ->join('customers', 'invoices.CustomerId', '=', 'customers.CustomerId')
        ->orderBy('invoices.InvoiceDate', 'DESC')
        ->get();

    // dd($invoices);

    return view('invoices/index', [
        'invoices' => $invoices,
        'invoiceCount' => count($invoices),
    ]);
});