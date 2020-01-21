<?php

namespace App\Http\Controllers;

use App\Custom\Repository\Daybook\BalanceRepo;
use App\Custom\Repository\Daybook\DaybookRepo;
use App\Custom\Validation\DaybookValidation;
use Illuminate\Http\Request;

class DaybookController extends Controller
{

    public function index(Request $request, DaybookRepo $repo)
    {
        $values = $repo->get_values($request['selectDate']);

        return view('panel.daybook.index', [
            'openingBalance' => $values['openingBalance'],
            'remainingBalance' => $values['remainingBalance'],
            'daybooks' => $repo->get_daybook($request['selectDate']),
            'date' => $request['selectDate']
        ]);
    }

    public function create(DaybookRepo $repo, BalanceRepo $balanceRepo)
    {
        $balanceRepo->endDay();

        return view('panel.daybook.create', [
            'openingBalance' => $repo->get_values(date('Y-m-d'))['remainingBalance']
        ]);
    }

    public function store(Request $request, DaybookRepo $repo)
    {
//        dd(date('2020-2-13'));

//        $dateString=date("Y-m-d");
//        $t = explode('-',$dateString);
//        echo $t[0]; //month
//        echo $t[1]; //day
//        echo $t[2]; //year
//
//        dd($t[0]);

        $repo->store($request, new DaybookValidation(), $request->has('status'));

        return back();
    }

    public function update(Request $request, $id, DaybookRepo $repo)
    {
//        return $request;
        $repo->update($request, $id, new DaybookValidation());

        return back();
    }


}
