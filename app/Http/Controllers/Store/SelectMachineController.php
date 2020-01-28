<?php

namespace App\Http\Controllers\Store;

use App\Custom\Repository\Store\SelectMachineRepo;
use App\Custom\Validation\SelectMachineValidation;
use App\Http\Controllers\Controller;
use App\Store\Inward;
use App\Store\Plantinfo;
use Illuminate\Http\Request;

class SelectMachineController extends Controller
{
    public function index($inward_id, SelectMachineRepo $repo)
    {
        return view('panel.store.selectmachine.index', [
            'rawmaterials'  => $repo->index($inward_id),
            'inward'        => Inward::findOrFail($inward_id),
        ]);
    }

    public function create($inward_id, SelectMachineRepo $repo)
    {
        $records = $repo->get_record($inward_id);

        return view('panel.store.selectmachine.create', [
            'machines'  => $records['machines'],
            'inward'    => $records['inward'],

        ]);
    }

    public function store(Request $request, SelectMachineRepo $repo)
    {
        $repo->store($request, new SelectMachineValidation());

        return back();
    }
}
