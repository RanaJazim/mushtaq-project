<?php

namespace App\Custom\Repository\Party;

use App\MyInvoice\Party;

class PartyEditRepo
{
    /*
     * @return the record that matches the $id
     * @params it will accept the id for matching the record and returning back
     */
    public function edit($id)
    {
        return Party::findOrFail($id);
    }
}





