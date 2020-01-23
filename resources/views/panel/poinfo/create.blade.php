@extends('panel.dashboard.main')

@section('title')
    Create PO
@endsection

@section('content')

    <div id="myheader">

        @alert
        <p>Dashboard > PO > Send Quantity</p>
        @endalert

        @btn
        <a href="{{ route('po.index', ['party'=>$po->party->id]) }}" class="btn btn-primary">All PO Entries</a>
        @endbtn

        @myform
        <div>
            <form id="myForm" method="POST" action="{{ route('poinfo.store') }}">
                @csrf

                <input type="hidden" name="po_id" value="{{ $po->id }}">

                <div class="form-group">
                    <label for="ogpNumber">OGP Number</label>
                    <input type="text" id="ogpNumber" class="form-control"
                           name="ogpNumber" value="{{ old('ogpNumber') }}">
                </div>

                <div class="form-group">
                    <label for="quantityOrder">Quantity Order </label>
                    <input type="number" id="quantityOrder" class="form-control"
                           value="{{ $po->quantityOrder }}" readonly>
                </div>

                <div class="form-group">
                    <label for="sendQuantity">Send Quantity </label>
                    <input type="number" id="sendQuantity" class="form-control"
                           name="sendQuantity" value="{{ old('sendQuantity') }}">
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







