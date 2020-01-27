<?php

namespace App\Http\Controllers\Store;

use App\Custom\Repository\Store\PrintReportRepo;
use App\Custom\Validation\PrintReportValidation;
use App\Http\Controllers\Controller;
use App\Store\Inward;
use Illuminate\Http\Request;

class PrintReportController extends Controller
{
    public function create($inward_id, PrintReportRepo $repo)
    {
        $values = $repo->create($inward_id);

        return view('panel.store.printreport.create', [
            'inward' => $values['inward'],
        ]);
    }

    public function store(Request $request, $inward_id, PrintReportRepo $repo)
    {
        return $repo->store($request, new PrintReportValidation());
//        return $request;
    }
}
