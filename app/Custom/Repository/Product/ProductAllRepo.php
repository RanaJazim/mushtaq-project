<?php

namespace App\Custom\Repository\Product;


use App\MyInvoice\Product;

class ProductAllRepo
{
    public function index()
    {
        return Product::all();
    }
}





