<?php

namespace App\Http\Controllers\Store;

use App\Custom\Repository\Party\PartyAllRepo;
use App\Custom\Repository\Product\ProductAllRepo;
use App\Custom\Repository\Store\InwardRepo;
use App\Custom\Validation\InwardValidation;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class InwardController extends Controller
{
    public function index(InwardRepo $repo)
    {
        return view('panel.store.inward.index', [
            'inwards' => $repo->index()
        ]);
    }

    public function create(PartyAllRepo $allRepo, ProductAllRepo $repo)
    {
        return view('panel.store.inward.create', [
            'products' => $repo->index(),
            'parties'  => $allRepo->index(),
            'isTaxPayer' => null
        ]);
    }

    public function store(Request $request, InwardRepo $repo)
    {
        $repo->store($request, new InwardValidation());

        return back();
    }

    public function edit($id)
    {
        return $id;
    }

    public function update(Request $request, $id)
    {
        return $request;
    }

    public function destroy($id)
    {
        return $id;
    }

}
