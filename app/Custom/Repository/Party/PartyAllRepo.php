<?php

namespace App\Custom\Repository\Party;

use App\MyInvoice\Party;

class PartyAllRepo
{
    public function index()
    {
        return Party::all();
    }
}





