<?php

namespace App\Store;

use App\MyInvoice\Party;
use App\MyInvoice\Product;
use Illuminate\Database\Eloquent\Model;

class Inward extends Model
{
    protected $guarded = [];

    public function party()
    {
        return $this->belongsTo(Party::class);
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function rawmaterials()
    {
        return $this->hasMany(Rawmaterial::class);
    }
}
