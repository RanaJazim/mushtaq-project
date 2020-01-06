<?php

namespace App\Custom\Repository\Party;

use App\MyInvoice\Party;

class InvoicePartyAllRepo
{
    /*
     * @return the record from the Party table
     * @params it will contains the input data
     * from the HTML Fields
     */
    public function all_record($request)
    {
        return Party::where('taxPayer', '=', $request['isTaxPayer'])
            ->get();
    }

    public function get_record($isTaxPayer)
    {
        return Party::where('taxPayer', '=', $isTaxPayer)
            ->get();
    }
}
