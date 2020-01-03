<?php

namespace App\Http\Controllers\Invoice;

use App\Custom\Repository\Party\PartyAllRepo;
use App\Custom\Repository\Party\PartyDeleteRepo;
use App\Custom\Repository\Party\PartyEditRepo;
use App\Custom\Repository\Party\PartyStoreRepo;
use App\Custom\Repository\Party\PartyUpdateRepo;
use App\Custom\Validation\PartyValidation;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PartyController extends Controller
{
    public function index(PartyAllRepo $repo)
    {
        return view('panel.invoice.party.index', [
            'parties' => $repo->index()
        ]);
    }

    public function create()
    {
        return view('panel.invoice.party.create');
    }

    public function store(Request $request, PartyStoreRepo $repo)
    {
        $repo->store($request, new PartyValidation());

        return back();
    }

    public function edit($id, PartyEditRepo $repo)
    {
        return view('panel.invoice.party.edit', [
            'party' => $repo->edit($id)
        ]);
    }

    public function update(Request $request, $id, PartyUpdateRepo $repo)
    {
        $repo->update($request, $id, new PartyValidation());

        return redirect()->route('party.index');
    }

    public function destroy($id, PartyDeleteRepo $repo)
    {
        $repo->delete($id);

        return back();
    }
}
