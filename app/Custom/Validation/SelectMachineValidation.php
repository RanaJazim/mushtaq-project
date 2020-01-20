<?php

namespace App\Custom\Validation;

class SelectMachineValidation implements IValidation
{

    public function validate_data($values)
    {
        return $values->validate([
            'inward_id'  => 'required',
            'machine_id' => 'required',
            'issue'       => 'required',
        ]);
    }
}
