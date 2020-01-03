@extends('panel.dashboard.main')

@section('title')
    Create Product
@endsection

@section('content')

    <div id="myheader">

        @alert
        <p>Dashboard > Product > Create Product</p>
        @endalert

        @btn
        <a href="{{ route('product.index') }}" class="btn btn-primary">All Product Entries</a>
        @endbtn

        @myform
        <div>
            <form id="myForm" method="POST" action="{{ route('product.store') }}">
                @csrf

                <div class="form-group">
                    <label for="productCode">Product Code</label>
                    <input type="text" id="productCode" class="form-control"
                           name="productCode" value="{{ old('productCode') }}">
                </div>

                <div class="form-group">
                    <label for="productName">Product Name </label>
                    <input type="text" id="productName" class="form-control"
                           name="productName" value="{{ old('productName') }}">
                </div>

                <div style="margin-top: 20px"></div>

                <input type="submit" class="btn btn-success">
                @btnclear(['title'=>'Clear Fields'])
                @endbtnclear
            </form>
        </div>
        @endmyform

        @include('error')

    </div>

@endsection







