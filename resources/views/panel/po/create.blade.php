@extends('panel.dashboard.main')

@section('title')
    Create PO
@endsection

@section('content')

    <div id="myheader">

        @alert
        <p>Dashboard > PO > Create PO</p>
        @endalert

        @btn
        <a href="{{ route('po.index', ['party'=>$party->id]) }}"
           class="btn btn-primary">All PO Entries</a>
        @endbtn

        @myform
        <div>
            <form id="myForm" method="POST" action="{{ route('po.store') }}">
                @csrf

                <input type="hidden" name="party_id" value="{{ $party->id }}">

                <div class="form-group">
                    <label for="date">Date</label>
                    <input type="date" id="date" class="form-control"
                           name="date" value="{{ old('date') }}">
                </div>

                <div class="form-group">
                    <label for="itemName">Item Name </label>
                    <input type="text" id="itemName" class="form-control"
                           name="itemName" value="{{ old('itemName') }}">
                </div>

                <div class="form-group">
                    <label for="size">Size</label>
                    <input type="number" id="size" class="form-control"
                           name="size" value="{{ old('size') }}">
                </div>

                <div class="form-group">
                    <label for="color">Color</label>
                    <input type="text" id="color" class="form-control"
                           name="color" value="{{ old('color') }}">
                </div>

                <div class="form-group">
                    <label for="quantityOrder">Quantity Order</label>
                    <input type="number" id="quantityOrder" class="form-control"
                           name="quantityOrder" value="{{ old('quantityOrder') }}">
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







