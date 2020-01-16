@extends('panel.dashboard.main')

@section('title')
    Edit Raw Material
@endsection

@section('content')

    <div id="myheader">

        @alert
        <p>Dashboard > Raw Material > Edit Record</p>
        @endalert


        @myform
        <div>
            <form id="myForm" method="POST" action="{{ route('rawmaterial.update',
            ['inwardId'=>$rawmaterial->inward->id, 'rawmaterial'=>$rawmaterial->id]) }}">
                @csrf
                @method('PATCH')

                <input type="hidden" name="inward_id" value="{{ $rawmaterial->inward->id }}">

                <div class="form-group">
                    <label for="storeName">Store Name</label>
                    <input type="text" id="storeName" class="form-control"
                           name="storeName" value="{{ $rawmaterial->storeName }}">
                </div>

                <div class="form-group">
                    <label for="issue">How much Issue?</label>
                    <input type="number" id="issue" class="form-control"
                           name="issue" value="{{ $rawmaterial->issue }}">
                </div>

                <div class="form-group">
                    <label for="qty">Quantity</label>
                    <input type="number" id="qty" class="form-control"
                           name="qty" value="{{ $rawmaterial->qty }}">
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







