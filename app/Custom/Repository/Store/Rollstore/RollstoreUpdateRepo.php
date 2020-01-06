<?php

namespace App\Custom\Repository\Store\Rollstore;

use App\Custom\Validation\IValidation;
use App\Store\Rollstore;

class RollstoreUpdateRepo
{
    public function update($values, $id, IValidation $validation)
    {
        $attributes = $validation->validate_data($values);
        $attributes['balance'] = $attributes['quantity'] * $attributes['issue'];

        return Rollstore::findOrFail($id)->update($attributes);
    }
}
