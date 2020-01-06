<?php

namespace App\Custom\Repository\Store\Rollstore;

use App\Store\Rollstore;

class RollstoreAllRepo
{
    public function index()
    {
        return Rollstore::all();
    }
}
