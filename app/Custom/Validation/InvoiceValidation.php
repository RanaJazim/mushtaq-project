<?php

namespace App\Custom\Validation;

class InvoiceValidation implements IValidation
{
    public function validate_data($values)
    {
        return $values->validate([
            'party_id' => 'required',
            'product_id' => 'required',
            'gpNumber' => 'required',
            'remarks' => 'required',
            'wrStatus' => 'required',
            'poNumber' => 'required',
            'vehicleNumber' => 'required',
            'size' => 'required',
            'rate' => 'required',
            'qty' => 'required',
        ]);
    }
}


