<?php

namespace App\Http\Controllers\Invoice;

use App\Custom\Repository\Invoice\InvoiceStoreRepo;
use App\Custom\Repository\Party\InvoicePartyAllRepo;
use App\Custom\Repository\Product\ProductAllRepo;
use App\Custom\Validation\InvoiceValidation;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class InvoiceController extends Controller
{
    public function index($isTaxPayer)
    {
        return $isTaxPayer;
    }

    public function open()
    {
        return view('panel.invoice.open');
    }

    public function create(Request $request, InvoicePartyAllRepo $repo,
                           ProductAllRepo $allRepo)
    {
        return view('panel.invoice.create', [
            'parties'   => $repo->all_record($request),
            'products'  => $allRepo->index(),
            'isTaxPayer'    => $request['isTaxPayer']
        ]);
    }

    public function store(Request $request, InvoiceStoreRepo $repo)
    {
        $repo->store($request, new InvoiceValidation());

        return back();
    }

}
