<?php

namespace App\Custom\Repository\Store\Rollstore;

use App\Store\Rollstore;

class RollstoreFinderRepo
{
    public function finder($id)
    {
        return Rollstore::findOrFail($id);
    }
}
