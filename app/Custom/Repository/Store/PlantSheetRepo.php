<?php

namespace App\Custom\Repository\Store;

use App\Custom\Validation\IValidation;
use App\Store\Inward;
use App\Store\Plantsheet;
use App\Store\Rawmaterial;

class PlantSheetRepo
{
    public function fetch_inward($inward_id)
    {
        $inward = Inward::with('plantinfo')
            ->findOrFail($inward_id);
        $flag = false;

        if ($inward->plantinfo)
            $flag = true;

        return [
            'inward'        => $inward,
            'is_available'  => $flag
        ];
    }
}
