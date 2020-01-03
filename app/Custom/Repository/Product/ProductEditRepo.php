<?php

namespace App\Custom\Repository\Product;

use App\MyInvoice\Product;

class ProductEditRepo
{
    /*
     * @return the record that matches the $id
     * @params it will accept the id for matching the record and returning back
     */
    public function edit($id)
    {
        return Product::findOrFail($id);
    }
}





