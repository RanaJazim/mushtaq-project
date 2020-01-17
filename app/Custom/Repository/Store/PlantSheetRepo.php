<?php

namespace App\Custom\Repository\Store;

use App\Custom\Validation\IValidation;
use App\Store\Plantsheet;
use App\Store\Rawmaterial;

class PlantSheetRepo
{
    public function index($raw_id)
    {
//        return Rawmaterial::findOrFail($raw_id)->plantsheets;

        return Plantsheet::with(['machine', 'rawmaterial.inward.product'])
            ->where('rawmaterial_id', '=', $raw_id)->get();
    }

    public function store($values, IValidation $validation)
    {
        $attributes = $validation->validate_data($values);
        $this->update_remaining_field($values);

        return Plantsheet::create($attributes);
    }

    private function update_remaining_field($values)
    {
        $inward = Rawmaterial::findOrFail($values['rawmaterial_id'])->inward;
        $inward->remaining = $inward->remaining - $values['useWeight'];
        $inward->save();

        return $inward;
    }

    public function edit($plantsheet_id)
    {
        return Plantsheet::with(['machine','rawmaterial.inward.product'])
            ->findOrFail($plantsheet_id);
    }

    public function update($values, $id, IValidation $validation)
    {
        $attributes = $validation->validate_data($values);
        $this->update_remaining_field($values);

        return Plantsheet::findOrFail($id)->update($attributes);
    }

}
