<?php

namespace App\Http\Controllers;

use App\Custom\Repository\GateRepository;
use App\Custom\Validation\GateValidation;
use Illuminate\Http\Request;

class GatesController extends Controller
{
    public function index(GateRepository $repository)
    {
        return view('panel.gate.index', [
            'gates' => $repository->all()
        ]);
    }

    public function create()
    {
        return view('panel.gate.create');
    }

    public function store(Request $request, GateRepository $repository)
    {
        $gate = $repository->store($request, new GateValidation($request));

        return back();
    }

    public function edit($id, GateRepository $repository)
    {
        return view('panel.gate.edit', [
            'gate' => $repository->single($id)
        ]);
    }

    public function update(Request $request, $id, GateRepository $repository)
    {
        $repository->update($request, new GateValidation(), $id);

        return redirect()->route('gate.index');
    }

    public function destroy($id, GateRepository $repository)
    {
        $repository->destroy($id);

        return back();
    }

}
