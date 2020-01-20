<?php

namespace App\Http\Controllers\Store;

use App\Custom\Repository\Store\PlantSheetRepo;
use App\Custom\Validation\PlantSheetValidation;
use App\Http\Controllers\Controller;
use App\Store\Inward;
use App\Store\Machine;
use App\Store\Plantsheet;
use App\Store\Rawmaterial;
use Illuminate\Http\Request;

class PlantSheetController extends Controller
{

    public function create($inward_id, PlantSheetRepo $repo)
    {
        $record = $repo->fetch_inward($inward_id);

        return view('panel.store.myplantsheet.create', [
            'inward'        => $record['inward'],
            'is_true'       => $record['is_available']
        ]);
    }

}
