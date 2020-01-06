<?php

namespace App\Http\Controllers\Store;

use App\Custom\Repository\Store\Rollstore\RollstoreAllRepo;
use App\Custom\Repository\Store\Rollstore\RollstoreDeleteRepo;
use App\Custom\Repository\Store\Rollstore\RollstoreFinderRepo;
use App\Custom\Repository\Store\Rollstore\RollstoreStoreRepo;
use App\Custom\Repository\Store\Rollstore\RollstoreUpdateRepo;
use App\Custom\Validation\RollstoreValidation;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RollstoreController extends Controller
{
    public function index(RollstoreAllRepo $repo)
    {
        return view('panel.store.rollstore.index', [
            'rollstores' => $repo->index()
        ]);
    }

    public function create()
    {
        return view('panel.store.rollstore.create');
    }

    public function store(Request $request, RollstoreStoreRepo $repo)
    {
        $repo->store($request, new RollstoreValidation());

        return back();
    }

    public function edit($id, RollstoreFinderRepo $repo)
    {
        return view('panel.store.rollstore.edit', [
            'rollstore' => $repo->finder($id)
        ]);
    }

    public function update(Request $request, $id, RollstoreUpdateRepo $repo)
    {
        $repo->update($request, $id, new RollstoreValidation());

        return redirect()->route('rollstore.index');
    }

    public function destroy($id, RollstoreDeleteRepo $repo)
    {
        $repo->destroy($id);

        return back();
    }

}
