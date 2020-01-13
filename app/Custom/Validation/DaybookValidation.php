<?php

namespace App\Custom\Validation;

class DaybookValidation implements IValidation
{
    public function validate_data($values)
    {
        /*
         * make sure later adding the min validation into the cnic i.e. min:13
         */
        return $values->validate([
            'price' => 'required',
            'description' => 'required',
        ]);
    }
}



