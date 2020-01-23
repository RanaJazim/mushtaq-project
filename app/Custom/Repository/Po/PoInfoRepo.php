<?php

namespace App\Custom\Repository\Po;

use App\Custom\Validation\IValidation;
use App\PoModule\Po;
use App\PoModule\Poinfo;

class PoInfoRepo
{
    public function store($values, IValidation $validation)
    {
        $attributes = $validation->validate_data($values);
        Poinfo::create($attributes);

        $this->update_po_fields($values);
    }

    private function update_po_fields($values)
    {
        $po = Po::findOrfail($values['po_id']);
        $quantityOrder = $po->quantityOder;
        $quantityOrder = $po->quantityOrder - $values['sendQuantity'];

        if ($quantityOrder <= 0) {
            $po->delete();
            return;
        }

        $po->quantityOrder = $quantityOrder;
        $po->save();
        return;
    }
}
