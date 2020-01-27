<?php

namespace App\Store;

use Illuminate\Database\Eloquent\Model;

class Printreport extends Model
{
    protected $guarded = [];

    public function inward()
    {
        return $this->hasOne(Inward::class);
    }
}
