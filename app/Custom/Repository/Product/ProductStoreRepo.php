<?php

namespace App\Custom\Repository\Product;

use App\Custom\Validation\IValidation;
use App\MyInvoice\Product;

class ProductStoreRepo
{
    public function store($values, IValidation $validation)
    {
        $attributes = $validation->validate_data($values);

        return Product::create($attributes);
    }
}





