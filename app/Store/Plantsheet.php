<?php

namespace App\Store;

use Illuminate\Database\Eloquent\Model;

class Plantsheet extends Model
{
    protected $guarded = [];

    public function machine()
    {
        return $this->belongsTo(Machine::class);
    }

    public function rawmaterial()
    {
        return $this->belongsTo(Rawmaterial::class);
    }
}
