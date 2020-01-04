@extends('panel.dashboard.main')

@section('title')
    Invoice Opening Page
@endsection

@section('content')

    <div id="myheader">

        @alert
        <p>Dashboard > Invoice > Opening Page</p>
        @endalert

        @btn
        <a data-toggle="modal" data-target="#1"
           href="#" class="btn btn-primary">
            Select Status
        </a>
        @endbtn

        <!-- adding the modal -->
        @modal(['simpleId'=>1])
        @slot('modalTitle')
            Invoice
        @endslot
        @slot('modalHeader')
            Please Select status as you want!
        @endslot

        <form method="GET"
              action="{{ route('invoice.create') }}">

            <div class="form-group">
                <label for="isTaxPayer">Select Status:</label>
                <select class="form-control" name="isTaxPayer" id="isTaxPayer">
                    <option value="1">Tax Payer</option>
                    <option value="0">Not Tax Payer</option>
                </select>
            </div>

            <input type="submit" class="btn btn-success"
                   value="Yes">
            <button type="button" class="btn btn-danger"
                    data-dismiss="modal">Close</button>
        </form>
        @endmodal
        <!-- adding the modal -->



    </div>

@endsection







