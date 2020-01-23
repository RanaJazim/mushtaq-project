<?php

namespace App\Custom\Validation;

class PoInfoValidation implements IValidation
{

    public function validate_data($values)
    {
        return $values->validate([
            'po_id' => 'required',
            'ogpNumber' => 'required',
            'sendQuantity' => 'required',
        ]);
    }
}
