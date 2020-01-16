<?php

namespace App\Http\Controllers\Store;

use App\Custom\Repository\Store\RawMaterialRepo;
use App\Custom\Validation\RawMaterialValidation;
use App\Http\Controllers\Controller;
use App\Store\Inward;
use App\Store\Rawmaterial;
use Illuminate\Http\Request;

class RawMaterialStoreController extends Controller
{
    public function index($inward_id, RawMaterialRepo $repo)
    {
        return view('panel.store.rawmaterial.index', [
            'rawmaterials' => $repo->index($inward_id)
        ]);
    }

    public function create($inward_id)
    {
        return view('panel.store.rawmaterial.create', [
            'inward' => Inward::findOrFail($inward_id)
        ]);
    }

    public function store(Request $request, $inward_id, RawMaterialRepo $repo)
    {
        $repo->store($request, new RawMaterialValidation());

        return back();
    }

    public function edit($inward_id, $id)
    {
        return view('panel.store.rawmaterial.edit', [
            'rawmaterial' => Rawmaterial::findOrFail($id)
        ]);
    }

    public function update(Request $request, $inward_id, $id, RawMaterialRepo $repo)
    {
        $repo->update($request, $id, new RawMaterialValidation());

        return redirect()->route('rawmaterial.index', ['inwardId'=>$inward_id]);
    }

    public function destroy($inward_id, $id)
    {
        dd($inward_id, $id);
    }

}
