@extends('layout')

@section('title', 'Invoices')

@section('main')
    <h1>Invoices ({{ $invoiceCount }})</h1>

    <table class="table table-striped">
      <thead>
        <tr>
          <th>Date</th>
          <th>Invoice Number</th>
          <th>Customer</th>
          <th>Total</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($invoices as $invoice)
          <tr>
            <td>{{ $invoice->InvoiceDate }}</td>
            <td>{{ $invoice->InvoiceId }}</td>
            <td>
              {{ $invoice->FirstName }} {{ $invoice->LastName }}
            </td>
            <td>${{ $invoice->Total }}</td>
          </tr>
        @endforeach
      </tbody>
    </table>
@endsection