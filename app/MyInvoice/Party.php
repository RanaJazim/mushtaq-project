<?php

namespace App\MyInvoice;

use App\PoModule\Po;
use App\Store\Inward;
use Illuminate\Database\Eloquent\Model;

class Party extends Model
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

    public function pos()
    {
        return $this->hasMany(Po::class);
    }
}
