<?php

namespace App\Http\Controllers\Store;

use App\Custom\Repository\Store\PlantSheetRepo;
use App\Custom\Validation\PlantSheetValidation;
use App\Http\Controllers\Controller;
use App\Store\Machine;
use App\Store\Plantsheet;
use App\Store\Rawmaterial;
use Illuminate\Http\Request;

class PlantSheetController extends Controller
{
    public function index($raw_id, PlantSheetRepo $repo)
    {
        return view('panel.store.plantsheet.index', [
            'plantsheets' => $repo->index($raw_id),
            'raw_id' => $raw_id
        ]);
    }

    public function create($raw_id)
    {
        return view('panel.store.plantsheet.create', [
            'rawmaterial' => Rawmaterial::findOrFail($raw_id),
            'machines' => Machine::all()
        ]);
    }

    public function store(Request $request, $raw_id, PlantSheetRepo $repo)
    {
        $repo->store($request, new PlantSheetValidation());

        return back();
    }

    public function edit($raw_id, $id, PlantSheetRepo $repo)
    {

        return view('panel.store.plantsheet.edit', [
            'plantsheet' => $repo->edit($id),
            'machines' => Machine::all()
        ]);
    }

    public function update(Request $request, $raw_id, $id, PlantSheetRepo $repo)
    {
        $repo->update($request, $id, new PlantSheetValidation());

        return redirect()->route('plantsheet.index', ['raw'=>$raw_id]);
    }

    public function destroy($raw_id, $id)
    {
        dd($raw_id, $id);
    }

}
