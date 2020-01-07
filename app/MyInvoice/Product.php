<?php

namespace App\MyInvoice;

use App\Store\Inward;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $guarded = [];

    public function invoices()
    {
        return $this->hasMany(Invoice::class);
    }

    public function inwards()
    {
        return $this->hasMany(Inward::class);
    }
}
