<?php

namespace App\Store;

use Illuminate\Database\Eloquent\Model;

class Plantsheet extends Model
{
    protected $guarded = [];

    public function rawmaterial()
    {
        return $this->belongsTo(Rawmaterial::class);
    }
}
