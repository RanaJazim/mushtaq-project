@extends('panel.dashboard.main')

@section('title')
    Edit Party
@endsection

@section('content')

    <div id="myheader">

        @alert
        <p>Dashboard > Party > Edit Party</p>
        @endalert

        @myform
        <div>
            <form id="myForm" method="POST"
                  action="{{ route('party.update', ['party' => $party->id]) }}">
                @csrf
                @method('PATCH')

                <div class="form-group">
                    <label for="buyerName">Buyer's Name</label>
                    <input type="text" id="buyerName" class="form-control"
                           name="buyerName" value="{{ $party->buyerName }}">
                </div>

                <div class="form-group">
                    <label for="address">Address </label>
                    <input type="text" id="address" class="form-control"
                           name="address" value="{{ $party->address }}">
                </div>

                <div class="form-group">
                    <label for="phoneNumber">Phone Number</label>
                    <input type="number" id="phoneNumber" class="form-control"
                           name="phoneNumber" value="{{ $party->phoneNumber }}">
                </div>

                <div class="form-group">
                    <label for="partyCode">Party Code</label>
                    <input type="text" id="partyCode" class="form-control"
                           name="partyCode" value="{{ $party->partyCode }}">
                </div>

                <div>
                    <div class="form-check">
                        <label class="form-check-label">
                            <input checked="{{ $party->taxPayer == 1 ? 'checked' : '' }}"
                                   type="radio" class="form-check-input"
                                   name="taxPayer" value="1">Tax Payer
                        </label>
                    </div>
                    <div class="form-check">
                        <label class="form-check-label">
                            <input checked="{{ $party->taxPayer == 1 ? 'checked' : '' }}"
                                   type="radio" class="form-check-input"
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







