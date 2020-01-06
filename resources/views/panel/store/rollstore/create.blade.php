@extends('panel.dashboard.main')

@section('title')
    Create Rolls Store
@endsection

@section('content')

    <div id="myheader">

        @alert
        <p>Dashboard > Roll Store > Create Roll Store</p>
        @endalert

        @btn
        <a href="{{ route('rollstore.index') }}" class="btn btn-primary">All Roll Store Entries</a>
        @endbtn

        @myform
        <div>
            <form id="myForm" method="POST" action="{{ route('rollstore.store') }}">
                @csrf

                <div class="form-group">
                    <label for="size">Size</label>
                    <input type="number" id="size" class="form-control"
                           name="size" value="{{ old('size') }}">
                </div>

                <div class="form-group">
                    <label for="partyName">Party Name </label>
                    <input type="text" id="partyName" class="form-control"
                           name="partyName" value="{{ old('partyName') }}">
                </div>

                <div class="form-group">
                    <label for="quantity">Quantity</label>
                    <input type="number" id="quantity" class="form-control"
                           name="quantity" value="{{ old('quantity') }}">
                </div>

                <div class="form-group">
                    <label for="issue">Issue</label>
                    <input type="number" id="issue" class="form-control"
                           name="issue" value="{{ old('issue') }}">
                </div>

                <div class="form-group">
                    <label for="description">Description</label>
                    <input type="text" id="description" class="form-control"
                           name="description" value="{{ old('description') }}">
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







