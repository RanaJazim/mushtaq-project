<?php

namespace App\Http\Controllers\Po;

use App\Custom\Repository\Po\PoInfoRepo;
use App\Custom\Validation\PoInfoValidation;
use App\Http\Controllers\Controller;
use App\PoModule\Po;
use Illuminate\Http\Request;

class PoInfoController extends Controller
{
    public function index($po_id)
    {
        return view('panel.poinfo.index', [
            'po' => Po::findOrFail($po_id)
        ]);
    }

    public function create($po_id)
    {
        return view('panel.poinfo.create', [
            'po' => Po::findOrFail($po_id)
        ]);
    }

    public function store(Request $request, PoInfoRepo $repo)
    {
        $repo->store($request, new PoInfoValidation());

        return back();
    }
}
