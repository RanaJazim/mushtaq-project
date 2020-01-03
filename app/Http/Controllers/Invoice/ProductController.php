<?php

namespace App\Http\Controllers\Invoice;

use App\Custom\Repository\Product\ProductAllRepo;
use App\Custom\Repository\Product\ProductDeleteRepo;
use App\Custom\Repository\Product\ProductEditRepo;
use App\Custom\Repository\Product\ProductStoreRepo;
use App\Custom\Repository\Product\ProductUpdateRepo;
use App\Custom\Validation\ProductValidation;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(ProductAllRepo $repo)
    {
        return view('panel.invoice.product.index', [
            'products' => $repo->index()
        ]);
    }

    public function create()
    {
        return view('panel.invoice.product.create');
    }

    public function store(Request $request, ProductStoreRepo $repo)
    {
        $repo->store($request, new ProductValidation());

        return back();
    }

    public function edit($id, ProductEditRepo $repo)
    {
        return view('panel.invoice.product.edit', [
            'product' => $repo->edit($id)
        ]);
    }

    public function update(Request $request, $id, ProductUpdateRepo $repo)
    {
        $repo->update($request, $id, new ProductValidation());

        return redirect()->route('product.index');
    }

    public function destroy($id, ProductDeleteRepo $repo)
    {
        $repo->delete($id);

        return back();
    }
}
