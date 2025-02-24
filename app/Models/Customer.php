<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;

class Customer extends Model
{
    protected $primaryKey = 'CustomerId';

    // old way
    // public function getFullNameAttribute() {
    //     return $this->FirstName . ' ' . $this->LastName;
    // }

    // new way
    protected function fullName(): Attribute
    {
        return Attribute::make(
            get: fn () => $this->FirstName . ' ' . $this->LastName,
        );
    }
}
