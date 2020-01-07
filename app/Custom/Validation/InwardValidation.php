<?php

namespace App\Custom\Validation;

class InwardValidation implements IValidation
{

    public function validate_data($values)
    {
        return $values->validate([
            'party_id' => 'required',
            'product_id' => 'required',
            'productColor' => 'required',
            'productSize' => 'required',
            'productQty' => 'required',
            'productRate' => 'required',
            'vehicleNumber' => 'required',
            'driverName' => 'required',
            'deliveredBy' => 'required',
            'preparedBy' => 'required',
        ]);
    }
}
