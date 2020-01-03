@extends('panel.dashboard.main')

@section('title')
    Create Employees
@endsection

@section('content')

    <div id="myheader">

        @alert
            <p>Dashboard > Gate > Create Gate</p>
        @endalert

        @btn
            <a href="{{ route('gate.index') }}" class="btn btn-primary">All Gate Entries</a>
        @endbtn

        @myform
            <div>
                <form id="myForm" method="POST" action="{{ route('gate.store') }}">
                    @csrf

                    <div class="form-group">
                        <label for="name">Employee Name</label>
                        <input type="text" id="name" class="form-control"
                               name="name" value="{{ old('name') }}">
                    </div>

                    <div class="form-group">
                        <label for="cnic">Employee CNIC</label>
                        <input type="number" id="cnic" class="form-control"
                               name="cnic" value="{{ old('cnic') }}">
                    </div>

                    <div class="form-group">
                        <label for="phoneNumber">Employee Phone Number</label>
                        <input type="number" id="phoneNumber" class="form-control"
                               name="phoneNumber" value="{{ old('phoneNumber') }}">
                    </div>

                    <div class="form-group">
                        <label for="address">Employee Address</label>
                        <input type="text" id="address" class="form-control"
                               name="address" value="{{ old('address') }}">
                    </div>

                    <div class="form-group">
                        <label for="vehicleNumber">Vehicle Number</label>
                        <input type="text" id="vehicleNumber" class="form-control"
                               name="vehicleNumber" value="{{ old('vehicleNumber') }}">
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







