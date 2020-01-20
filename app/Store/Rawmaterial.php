<?php

namespace App\Store;

use Illuminate\Database\Eloquent\Model;

class Rawmaterial extends Model
{
    protected $guarded = [];

    public function inward()
    {
        return $this->belongsTo(Inward::class);
    }

    public function machine()
    {
        return $this->belongsTo(Machine::class);
    }

//    public function machines()
//    {
//        return $this->hasMany(Machine::class);
//    }

    public function plantsheet()
    {
        return $this->hasOne(Plantsheet::class);
    }

//    public function plantinfo()
//    {
//        return $this->hasOne(Plantinfo::class);
//    }
}
