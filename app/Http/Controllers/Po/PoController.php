<?php

namespace App\Http\Controllers\Po;

use App\Custom\Repository\Po\PoRepository;
use App\Custom\Validation\PoValidation;
use App\Http\Controllers\Controller;
use App\MyInvoice\Party;
use Illuminate\Http\Request;

class PoController extends Controller
{
    public function index($party_id)
    {
        return view('panel.po.index', [
            'party' => Party::findOrFail($party_id)
        ]);
    }

    public function open()
    {
        return view('panel.po.open', [
            'parties' => Party::all()
        ]);
    }

    public function create($po_id)
    {
        return view('panel.po.create', [
            'party' => Party::findOrFail($po_id)
        ]);
    }

    public function store(Request $request, PoRepository $repo)
    {
        $repo->store($request, new PoValidation());

        return back();
    }

    public function destroy($id, PoRepository $repo)
    {
        return $id;
    }

}
