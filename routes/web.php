<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/invoices', function () {
    $invoices = DB::table('invoices')->get(); // SELECT * FROM invoices
    // dd($invoices);

    return view('invoices/index', [
        'invoices' => $invoices,
        'invoiceCount' => count($invoices),
    ]);
});