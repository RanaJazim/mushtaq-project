<?php

namespace App\Custom\Repository\Po;

use App\Custom\Validation\IValidation;
use App\MyInvoice\Party;
use App\PoModule\Po;

class PoRepository
{

    public function store($values, IValidation $validation)
    {
        $attributes = $validation->validate_data($values);

        return Po::create($attributes);
    }
}
