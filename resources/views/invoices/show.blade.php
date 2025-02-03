@extends('layout')

@section('title')
  Invoice #{{ $invoice->InvoiceId }}
@endsection

@section('main')
  <h1>Invoice #{{ $invoice->InvoiceId }}</h1>
@endsection