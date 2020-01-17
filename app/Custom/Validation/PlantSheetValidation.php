<?php

namespace App\Custom\Validation;

class PlantSheetValidation implements IValidation
{
    public function validate_data($values)
    {
        return $values->validate([
            'machine_id' => 'required',
            'rawmaterial_id' => 'required',
            'partyName' => 'required',
            'nali' => 'required',
            'sheet' => 'required',
            'useWeight' => 'required',
            'size' => 'required',
        ]);
    }
}
