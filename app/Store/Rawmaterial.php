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
}
