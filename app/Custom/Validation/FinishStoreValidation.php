<?php

namespace App\Custom\Validation;

class FinishStoreValidation implements IValidation
{

    public function validate_data($values)
    {
        return $values->validate([
            'partyName' => 'required',
            'description' => 'required',
            'size' => 'required',
            'color' => 'required',
            'quantity' => 'required',
            'waste' => 'required',
        ]);
    }
}
