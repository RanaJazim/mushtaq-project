<?php

namespace App\Custom\Validation;

class GateValidation implements IValidation
{
    public function validate_data($values)
    {
        /*
         * make sure later adding the min validation into the cnic i.e. min:13
         */
        return $values->validate([
            'name' => 'required|min:3|max:30',
            'cnic' => 'required|max:13',
            'phoneNumber' => 'required|regex:/(03)[0-9]{9}/|max:11',
            'address' => 'required|min:3|max:100',
            'vehicleNumber' => 'required|min:1|max:20',
        ]);
    }
}



