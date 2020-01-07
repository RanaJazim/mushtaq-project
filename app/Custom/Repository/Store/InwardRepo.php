<?php

namespace App\Custom\Repository\Store;

use App\Custom\Validation\IValidation;
use App\Store\Inward;

class InwardRepo
{
    public function index()
    {
        return Inward::all();
    }

    public function store($values, IValidation $validation)
    {
        $attributes = $validation->validate_data($values);
        $attributes['totalPrice'] = $attributes['productQty'] * $attributes['productRate'];

        return Inward::create($attributes);
    }
}
