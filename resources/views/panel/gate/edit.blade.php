@extends('panel.dashboard.main')

@section('title')
    Edit Employee
@endsection

@section('content')

    <div id="myheader">

        @alert
        <p>Dashboard > Gate > Edit Gate</p>
        @endalert


        @myform
        <div>
            <form id="myForm" method="POST" action="{{ route('gate.update', ['gate'=>$gate->id]) }}">
                @csrf
                @method('PATCH')

                <div class="form-group">
                    <label for="name">Employee Name</label>
                    <input type="text" id="name" class="form-control"
                           name="name" value="{{ $gate->name }}">
                </div>

                <div class="form-group">
                    <label for="cnic">Employee CNIC</label>
                    <input type="number" id="cnic" class="form-control"
                           name="cnic" value="{{ $gate->cnic }}">
                </div>

                <div class="form-group">
                    <label for="phoneNumber">Employee Phone Number</label>
                    <input type="number" id="phoneNumber" class="form-control"
                           name="phoneNumber" value="{{ $gate->phoneNumber }}">
                </div>

                <div class="form-group">
                    <label for="address">Employee Address</label>
                    <input type="text" id="address" class="form-control"
                           name="address" value="{{ $gate->address }}">
                </div>

                <div class="form-group">
                    <label for="vehicleNumber">Vehicle Number</label>
                    <input type="text" id="vehicleNumber" class="form-control"
                           name="vehicleNumber" value="{{ $gate->vehicleNumber }}">
                </div>

                <input type="submit" class="btn btn-success">

            </form>
        </div>
        @endmyform

        @include('error')

    </div>

@endsection







