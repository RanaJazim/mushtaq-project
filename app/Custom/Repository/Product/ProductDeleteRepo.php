<?php

namespace App\Custom\Repository\Product;


use App\MyInvoice\Product;

class ProductDeleteRepo
{
    /*
     * @return if the record deleted or not more probably boolean either 0 or 1
     * @params accept $id for checking record if exist delete this row
     */
    public function delete($id)
    {
        return Product::findOrFail($id)->delete();
    }
}





