<?php

namespace App\Custom\Repository\Store\Rollstore;

use App\Store\Rollstore;

class RollstoreDeleteRepo
{
    public function destroy($id)
    {
        return Rollstore::findOrFail($id)->delete();
    }
}
