<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <title>Invoices</title>
</head>
<body>
  <div class="container">
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
  </div>
</body>
</html>