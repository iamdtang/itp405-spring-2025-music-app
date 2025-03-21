<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    protected $primaryKey = 'InvoiceId';

    public function customer()
    {
        return $this->belongsTo(Customer::class, 'CustomerId');
    }

    public function invoiceItems()
    {
        return $this->hasMany(InvoiceItem::class, 'InvoiceId', 'InvoiceId');
    }
}
