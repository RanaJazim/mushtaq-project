@extends('panel.dashboard.main')

@section('title')
    Edit Product
@endsection

@section('content')

    <div id="myheader">

        @alert
        <p>Dashboard > Product > Edit Product</p>
        @endalert

        @myform
        <div>
            <form id="myForm" method="POST"
                  action="{{ route('product.update', ['product'=>$product]) }}">
                @csrf
                @method('PATCH')

                <div class="form-group">
                    <label for="productCode">Product Code</label>
                    <input type="text" id="productCode" class="form-control"
                           name="productCode" value="{{ $product->productCode }}">
                </div>

                <div class="form-group">
                    <label for="productName">Product Name </label>
                    <input type="text" id="productName" class="form-control"
                           name="productName" value="{{ $product->productName }}">
                </div>

                <div style="margin-top: 20px"></div>

                <input type="submit" class="btn btn-success">

            </form>
        </div>
        @endmyform

        @include('error')

    </div>

@endsection







