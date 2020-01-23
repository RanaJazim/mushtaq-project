<?php

namespace App\Custom\Validation;

class PoValidation implements IValidation
{

    public function validate_data($values)
    {
        return $values->validate([
            'party_id' => 'required',
            'date' => 'required',
            'itemName' => 'required',
            'size' => 'required',
            'color' => 'required',
            'quantityOrder' => 'required',
        ]);
    }
}
