<?php

namespace App\Custom\Repository\Product;

use App\Custom\Validation\IValidation;
use App\MyInvoice\Product;

class ProductUpdateRepo
{
    /*
     * @return if record is updated or not most probably return boolean 0 or 1
     * @params it will accept the id, request which holds the information of
     * input fields of HTML and validation for checking some validation before
     * saving into the database for matching the record and returning
     */
    public function update($values, $id, IValidation $validation)
    {
        $attributes = $validation->validate_data($values);

        return Product::findOrFail($id)->update($attributes);
    }
}





