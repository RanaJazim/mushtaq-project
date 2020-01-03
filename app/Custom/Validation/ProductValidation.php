<?php

namespace App\Custom\Validation;

class ProductValidation implements IValidation
{
    public function validate_data($values)
    {
        /*
         * @return the validate data that is most probably associate array
         */
        return $values->validate([
            'productCode' => 'required',
            'productName' => 'required',
        ]);
    }
}



