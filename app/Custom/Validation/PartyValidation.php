<?php

namespace App\Custom\Validation;

class PartyValidation implements IValidation
{
    public function validate_data($values)
    {
        return $values->validate([
            'buyerName' => 'required|min:3|max:30',
            'address' => 'required|min:3|max:100',
            'phoneNumber' => 'required|regex:/(03)[0-9]{9}/|max:11',
            'partyCode' => 'required',
            'taxPayer' => 'required',
        ]);
    }
}




