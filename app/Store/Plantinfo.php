<?php

namespace App\Store;

use Illuminate\Database\Eloquent\Model;

class Plantinfo extends Model
{
    protected $guarded = [];

//    public function rawmaterial()
//    {
//        return $this->belongsTo(Rawmaterial::class);
//    }

    public function inward()
    {
        return $this->belongsTo(Inward::class);
    }

//    public function inward()
//    {
//        return $this->hasOne(Inward::class);
//    }
}
