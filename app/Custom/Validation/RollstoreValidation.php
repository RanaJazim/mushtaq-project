<?php

namespace App\Custom\Validation;

class RollstoreValidation implements IValidation
{

    public function validate_data($values)
    {
        return $values->validate([
            'size' => 'required',
            'partyName' => 'required',
            'quantity' => 'required',
            'issue' => 'required',
            'description' => 'required',
        ]);
    }
}
