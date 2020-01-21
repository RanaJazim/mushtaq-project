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

    public function create($inward_id, $raw_id, PlantSheetRepo $repo)
    {
        $record = $repo->fetch_inward($inward_id);

        return view('panel.store.myplantsheet.create', [
            'inward'            => $record['inward'],
            'is_true'           => $record['is_available'],
            'plantinfo'         => $record['plantinfo'],
            'rawmaterial_id'    => $raw_id
        ]);
    }

    public function store(Request $request, PlantSheetRepo $repo)
    {
        $repo->store($request, new PlantSheetValidation());

        return redirect()->route('machine.index',
            ['inward'=>$request['inward_id']]);
    }



}
