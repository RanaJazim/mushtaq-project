@extends('panel.dashboard.main')

@section('title')
    Create Final Finish Store
@endsection

@section('content')

    <div id="myheader">

        @alert
        <p>Dashboard > Final Finish Store > Edit Final Finish Store</p>
        @endalert


        @include('error')

        @myform
        <div>
            <form id="myForm" method="POST" action="{{ route('finishstore.update',
                    ['id'=>$store->id]) }}">
                @csrf
                @method('PATCH')

                <div class="form-group">
                    <label for="partyName">Party Name</label>
                    <input type="text" id="partyName" class="form-control"
                           name="partyName" value="{{ $store->partyName }}">
                </div>

                <div class="form-group">
                    <label for="description">Description</label>
                    <input type="text" id="description" class="form-control"
                           name="description" value="{{ $store->description }}">
                </div>

                <div class="form-group">
                    <label for="size">Size</label>
                    <input type="number" id="size" class="form-control"
                           name="size" value="{{ $store->size }}">
                </div>

                <div class="form-group">
                    <label for="color">Color</label>
                    <input type="text" id="color" class="form-control"
                           name="color" value="{{ $store->color }}">
                </div>

                <div class="form-group">
                    <label for="quantity">Quantity</label>
                    <input type="number" id="quantity" class="form-control"
                           name="quantity" value="{{ $store->quantity }}">
                </div>

                <div class="form-group">
                    <label for="waste">Waste</label>
                    <input type="number" id="waste" class="form-control"
                           name="waste" value="{{ $store->waste }}">
                </div>

                <input type="submit" class="btn btn-success">
                @btnclear(['title'=>'Clear Fields'])
                @endbtnclear
            </form>
        </div>
        @endmyform


    </div>

@endsection







