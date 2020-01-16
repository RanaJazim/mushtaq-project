<?php

namespace App\Custom\Validation;

class RawMaterialValidation implements IValidation
{
    public function validate_data($values)
    {
        return $values->validate([
            'inward_id' => 'required',
            'storeName' => 'required',
            'issue' => 'required',
            'qty' => 'required',
        ]);
    }
}
