@extends('panel.dashboard.main')

@section('title')
    Create Raw Material
@endsection

@section('content')

    <div id="myheader">

        @alert
        <p>Dashboard > Raw Material > Create Record</p>
        @endalert

        @btn
        <a href="{{ route('rawmaterial.index', ['inwardId'=>$inward->id]) }}"
           class="btn btn-primary">All Raw Material Entries</a>
        @endbtn

        @myform
        <div>
            <form id="myForm" method="POST" action="{{ route('rawmaterial.store',
                    ['inwardId'=>$inward->id]) }}">
                @csrf

                <input type="hidden" name="inward_id" value="{{ $inward->id }}">

                <div class="form-group">
                    <label for="storeName">Store Name</label>
                    <input type="text" id="storeName" class="form-control"
                           name="storeName" value="{{ old('storeName') }}">
                </div>

                <div class="form-group">
                    <label for="issue">How much Issue?</label>
                    <input type="number" id="issue" class="form-control"
                           name="issue" value="{{ old('issue') }}">
                </div>

                <div class="form-group">
                    <label for="qty">Quantity</label>
                    <input type="number" id="qty" class="form-control"
                           name="qty" value="{{ old('qty') }}">
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







