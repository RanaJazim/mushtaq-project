@extends('panel.dashboard.main')

@section('title')
    Create Party
@endsection

@section('content')

    <div id="myheader">

        @alert
        <p>Dashboard > Party > Create Party</p>
        @endalert

        @btn
        <a href="{{ route('party.index') }}" class="btn btn-primary">All Party Entries</a>
        @endbtn

        @myform
        <div>
            <form id="myForm" method="POST" action="{{ route('party.store') }}">
                @csrf

                <div class="form-group">
                    <label for="buyerName">Buyer's Name</label>
                    <input type="text" id="buyerName" class="form-control"
                           name="buyerName" value="{{ old('buyerName') }}">
                </div>

                <div class="form-group">
                    <label for="address">Address </label>
                    <input type="text" id="address" class="form-control"
                           name="address" value="{{ old('address') }}">
                </div>

                <div class="form-group">
                    <label for="phoneNumber">Phone Number</label>
                    <input type="number" id="phoneNumber" class="form-control"
                           name="phoneNumber" value="{{ old('phoneNumber') }}">
                </div>

                <div class="form-group">
                    <label for="partyCode">Party Code</label>
                    <input type="text" id="partyCode" class="form-control"
                           name="partyCode" value="{{ old('partyCode') }}">
                </div>

                <div>
                    <div class="form-check">
                        <label class="form-check-label">
                            <input checked type="radio" class="form-check-input"
                                   name="taxPayer" value="1">Tax Payer
                        </label>
                    </div>
                    <div class="form-check">
                        <label class="form-check-label">
                            <input type="radio" class="form-check-input"
                                   name="taxPayer" value="0">Not Tax Payer
                        </label>
                    </div>
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







