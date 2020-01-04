<?php

namespace App\Http\Controllers\Invoice;

use App\Custom\Repository\Party\InvoicePartyAllRepo;
use App\Custom\Repository\Product\ProductAllRepo;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class InvoiceController extends Controller
{

    public function open()
    {
        return view('panel.invoice.open');
    }

    public function create(Request $request, InvoicePartyAllRepo $repo,
                           ProductAllRepo $allRepo)
    {
        return view('panel.invoice.create', [
            'parties'   => $repo->all_record($request),
            'products'  => $allRepo->index()
        ]);
    }

    public function store(Request $request)
    {
        return $request;
    }

}
