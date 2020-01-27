<?php

namespace App\Custom\Repository\Store;

use App\Custom\Validation\IValidation;
use App\Store\Finishstore;

class FinishStoreRepo
{
    public function store($values, IValidation $validation)
    {
        $attributes = $validation->validate_data($values);

        return Finishstore::create($attributes);
    }

    public function update($values, $id, IValidation $validation)
    {
        $attributes = $validation->validate_data($values);
        $store = Finishstore::findOrFail($id);

        return $store->update($attributes);
    }

    public function delete($id)
    {
        return Finishstore::findOrFail($id)->delete();
    }
}
