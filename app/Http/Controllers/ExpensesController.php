<?php

namespace App\Http\Controllers;

use App\Custom\Repository\ExpensesRepo;
use Illuminate\Http\Request;

class ExpensesController extends Controller
{

    public function create()
    {
        return view('panel.expenses.create');
    }

    public function selectDate(Request $request, ExpensesRepo $repo)
    {
        return $repo->get_expenses($request);
        return $request;
    }

}
