<?php

namespace App\PoModule;

use Illuminate\Database\Eloquent\Model;

class Poinfo extends Model
{
    protected $guarded = [];

    public function po()
    {
        return $this->belongsTo(Po::class);
    }
}
