<?php

namespace App\Custom\Repository\Store;

use App\Custom\Validation\IValidation;
use App\Store\Inward;
use App\Store\Rawmaterial;

class RawMaterialRepo
{
    public function index($inward_id)
    {
        return Inward::findOrFail($inward_id)->rawmaterials;
    }

    public function store($values, IValidation $validation)
    {
        $attributes = $validation->validate_data($values);
        $this->update_inward_remaining($attributes);

        return Rawmaterial::create($attributes);
    }

    public function update($values, $id, IValidation $validation)
    {
        $attributes = $validation->validate_data($values);
        $this->update_inward_remaining($attributes);

        return Rawmaterial::findOrFail($id)->update($attributes);
    }

    private function update_inward_remaining($validate_data)
    {
        $inward = Inward::findOrFail($validate_data['inward_id']);
        $inward->remaining = $validate_data['qty'] - $validate_data['issue'];
        $inward->save();
    }
}
