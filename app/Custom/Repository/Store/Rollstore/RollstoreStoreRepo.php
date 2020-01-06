<?php

namespace App\Custom\Repository\Store\Rollstore;

use App\Custom\Validation\IValidation;
use App\Store\Rollstore;

class RollstoreStoreRepo
{
    public function store($values, IValidation $validation)
    {
        $attributes = $validation->validate_data($values);
        $attributes['balance'] = $attributes['quantity'] * $attributes['issue'];

        return Rollstore::create($attributes);
    }
}

