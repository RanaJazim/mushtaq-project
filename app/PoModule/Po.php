<?php

namespace App\PoModule;

use App\MyInvoice\Party;
use Illuminate\Database\Eloquent\Model;

class Po extends Model
{
    protected $guarded = [];

    public function party()
    {
        return $this->belongsTo(Party::class);
    }

    public function poinfos()
    {
        return $this->hasMany(Poinfo::class);
    }
}
