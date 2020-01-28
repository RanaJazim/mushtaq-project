<?php

namespace App\Http\Controllers\Invoice;

use App\Custom\Repository\Invoice\InvoiceAllRepo;
use App\Custom\Repository\Invoice\InvoiceStoreRepo;
use App\Custom\Repository\Party\InvoicePartyAllRepo;
use App\Custom\Repository\Party\PartyEditRepo;
use App\Custom\Repository\Product\ProductAllRepo;
use App\Custom\Validation\InvoiceValidation;
use App\Http\Controllers\Controller;
use App\MyInvoice\Party;
use Illuminate\Http\Request;

class InvoiceController extends Controller
{
    public function allParty(InvoicePartyAllRepo $repo, $party_id, $isTaxPayer)
    {
        return view('panel.invoice.record', [
            'invoices' => $repo->get_appropriate_record($party_id),
            'isTaxPayer' => $isTaxPayer
        ]);
    }

    public function index($isTaxPayer, InvoicePartyAllRepo $repo)
    {
        return view('panel.invoice.index', [
            'isTaxPayer' => $isTaxPayer,
            'parties'    => $repo->get_record($isTaxPayer)
        ]);
    }

    public function open()
    {
        return view('panel.invoice.open');
    }

    public function create(Request $request, InvoicePartyAllRepo $repo,
                           ProductAllRepo $allRepo)
    {
        return view('panel.invoice.create', [
            'parties'       => $repo->all_record($request),
            'products'      => $allRepo->index(),
            'isTaxPayer'    => $request['isTaxPayer']
        ]);
    }

    public function store(Request $request, InvoiceStoreRepo $repo)
    {
        $repo->store($request, new InvoiceValidation());

        return back();
    }

    public function print($invoice_id, $isTaxPayer, InvoiceAllRepo $repo)
    {
        $records = $repo->print($invoice_id, $isTaxPayer);

        return view('panel.invoice.' . $records['link']);
    }

    public function dcPrint($invoice_id, $isTaxPayer)
    {
        return view('panel.invoice.dcReport');
    }

}
