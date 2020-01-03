<?php

namespace App\Custom\Repository\Party;

use App\Custom\Validation\IValidation;
use App\MyInvoice\Party;

class PartyStoreRepo
{
    public function store($values, IValidation $validation)
    {
        $attributes = $validation->validate_data($values);

        return Party::create($attributes);
    }
}





