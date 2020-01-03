<?php

namespace App\Custom\Repository\Party;

use App\Custom\Validation\IValidation;
use App\MyInvoice\Party;

class PartyDeleteRepo
{
    /*
     * @return if the record deleted or not more probably boolean either 0 or 1
     * @params accept $id for checking record if exist delete this row
     */
    public function delete($id)
    {
        return Party::findOrFail($id)->delete();
    }
}





