<?php

namespace App\Http\Controllers\Store;

use App\Custom\Repository\Store\FinishStoreRepo;
use App\Custom\Validation\FinishStoreValidation;
use App\Http\Controllers\Controller;
use App\Store\Finishstore;
use Illuminate\Http\Request;

class FinishStoreController extends Controller
{
    public function index()
    {
        return view('panel.store.finishstore.index', [
            'stores' => Finishstore::all()
        ]);
    }

    public function create()
    {
        return view('panel.store.finishstore.create');
    }

    public function store(Request $request, FinishStoreRepo $repo)
    {
        $repo->store($request, new FinishStoreValidation());

        return back();
    }

    public function edit($id)
    {
        return view('panel.store.finishstore.edit', [
            'store' => Finishstore::findOrFail($id)
        ]);
    }

    public function update(Request $request, $id, FinishStoreRepo $repo)
    {
        $repo->update($request, $id, new FinishStoreValidation());

        return redirect()->route('finishstore.index');
    }

    public function destroy($id, FinishStoreRepo $repo)
    {
        $repo->delete($id);

        return back();
    }
    
}
