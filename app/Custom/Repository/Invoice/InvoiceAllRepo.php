<?php

namespace App\Custom\Repository\Invoice;

use App\MyInvoice\Invoice;
use App\MyInvoice\Party;

class InvoiceAllRepo
{
    public function index($isTaxPayer)
    {
        return Party::where('taxPayer', '=', $isTaxPayer)->get();
    }

    public function print($invoice_id, $isTaxPayer)
    {
        $link = 'withoutTaxReport';
        if ($isTaxPayer)
            $link = 'taxReport';

        return [
          'invoice' => Invoice::findOrFail($invoice_id),
          'link'    => $link
        ];
    }
}
