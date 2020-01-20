<?php

namespace App\Store;

use Illuminate\Database\Eloquent\Model;

class Machine extends Model
{
    protected $guarded = [];

    public function plantsheets()
    {
        return $this->hasMany(Plantsheet::class);
    }

    public function rawmaterial()
    {
        return $this->hasOne(Rawmaterial::class);
    }
}
