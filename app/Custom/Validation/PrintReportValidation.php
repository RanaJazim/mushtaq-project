<?php

namespace App\Custom\Validation;

class PrintReportValidation implements IValidation
{

    public function validate_data($values)
    {
        return $values->validate([
            'inward_id' => 'required',
            'gas' => 'required',
            'perGas' => 'required',
            'starchUse' => 'required',
            'perStarchUse' => 'required',
            'causticSoda' => 'required',
            'perCausticSoda' => 'required',
            'borex' => 'required',
            'perBorex' => 'required',
            'wood' => 'required',
            'perWood' => 'required',
            'electricity' => 'required',
            'labSheet' => 'required',
            'office' => 'required',
            'labCtn' => 'required',
            'priCh' => 'required',
            'pinCh' => 'required',
        ]);
    }
}
