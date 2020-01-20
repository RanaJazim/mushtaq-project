@extends('panel.dashboard.main')

@section('title')
    Create Plant Sheet
@endsection

@section('content')

    <div id="myheader">

        @alert
        <p>Dashboard > Plant Sheet > Create Plant Sheet Entry</p>
        @endalert


        @myform
        <div>
            <form id="myForm" method="POST" action="{{ route('gate.store') }}">
                @csrf

                <div class="form-group">
                    <label for="vehicleNumber">Material in Use</label>
                    <input type="text" id="vehicleNumber" class="form-control"
                           value="{{ $inward->product->productName }}" readonly>
                </div>

                <div class="form-group">
                    <label for="vehicleNumber">Product Size</label>
                    <input type="text" id="vehicleNumber" class="form-control"
                           value="{{ $inward->productSize }}" readonly>
                </div>

                <div class="form-group">
                    <label for="vehicleNumber">Product Qty</label>
                    <input type="text" id="vehicleNumber" class="form-control"
                           value="{{ $inward->productQty }}" readonly>
                </div>

                <div class="form-group">
                    <label for="vehicleNumber">Product Rate</label>
                    <input type="text" id="vehicleNumber" class="form-control"
                           value="{{ $inward->productRate }}" readonly>
                </div>

                <!-- Plant Sheet info -->

                <div class="form-group">
                    <label for="name">Party Name</label>
                    <input type="text" id="name" class="form-control"
                           name="name" value="{{ $is_true ? $inward->plantinfo->partyName : '' }}">
                </div>

                <div class="form-group">
                    <label for="nali">Nali</label>
                    <input type="text" id="nali" class="form-control"
                           name="nali" value="{{ $is_true ? $inward->plantinfo->nali : ''}}">
                </div>

                <div class="form-group">
                    <label for="sheetPly">Sheet ( Ply )</label>
                    <input type="number" id="sheetPly" class="form-control"
                           name="sheetPly" value="{{ $is_true ? $inward->plantinfo->sheetPly : '' }}">
                </div>

                <div class="form-group">
                    <label for="size2">Size</label>
                    <input type="number" id="size2" class="form-control"
                           name="size" value="{{ $is_true ? $inward->plantinfo->size : '' }}">
                </div>

                <div class="form-group">
                    <label for="sheet">Sheet</label>
                    <input type="number" id="sheet" class="form-control"
                           name="sheet" value="{{ $is_true ? $inward->plantinfo->sheet : '' }}">
                </div>

                <!-- /Plant Sheet Info -->

                <div class="form-group">
                    <label for="useWeight">Use Weight</label>
                    <input type="number" id="useWeight" class="form-control"
                           name="useWeight" value="{{ old('useWeight') }}">
                </div>

                <input type="submit" class="btn btn-success">
                @btnclear(['title'=>'Clear Fields'])
                @endbtnclear
            </form>
        </div>
        @endmyform

        @include('error')

    </div>

@endsection







