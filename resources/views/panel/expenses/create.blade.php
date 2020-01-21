@extends('panel.dashboard.main')

@section('title')
    Expenses
@endsection

@section('content')

    <div id="myheader">

        @alert
        <p>Dashboard > Expenses </p>
        @endalert

        @btn
        <a data-toggle="modal" data-target="#1"
            href="#" class="btn btn-primary">
            Select Date For Expenses
        </a>
        @endbtn

        <!-- adding the modal -->
        @modal(['simpleId'=>1])
        @slot('modalTitle')
            Expenses
        @endslot
        @slot('modalHeader')

            <form>

                <div class="form-group">
                    <label for="date">Please Select Date</label>
                    <input type="month" class="form-control" name="date" id="date">
                </div>

                <input id="http_btn" type="button" class="btn btn-success"
                       value="Yes">
                <button type="button" class="btn btn-danger"
                        data-dismiss="modal">Close</button>
            </form>
        @endslot


        @endmodal
        <!-- adding the modal -->


    </div>

@endsection


@push('scripts')

    <script>
        $("#http_btn").click(function(){
            $.get("/expenses", function(data, status){
                alert("Data: " + data + "\nStatus: " + status);
            });
        });
    </script>

@endpush


