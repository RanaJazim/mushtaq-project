<?php

namespace App\Custom\Repository\Invoice;

use App\MyInvoice\Party;

class InvoiceAllRepo
{
    public function index($isTaxPayer)
    {
        return Party::where('taxPayer', '=', $isTaxPayer)->get();
    }
}
