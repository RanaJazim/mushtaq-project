@extends('panel.dashboard.main')

@section('title')
    All Invoices
@endsection

@section('content')

    <div id="myheader">

        @alert
        <p>Dashboard > Invoice > Display All Invoice Entries for Specific Party</p>
        @endalert

        @btn
        <a href="{{ route('gate.create') }}" class="btn btn-primary">Back</a>
        @endbtn

        @mytable
        <div>
            <table class="table table-bordered">
                <tr>
                    <th>Sr No</th>
                    <th>PO Number</th>
                    <th>Vehicle Number</th>
                    <th>Print DC</th>
                    <th>Print</th>
                    <th>Action</th>
                </tr>
                @foreach($invoices as $invoice)
                    <tr>
                        <td>{{ $invoice->id }}</td>
                        <td>{{ $invoice->poNumber }}</td>
                        <td>{{ $invoice->vehicleNumber }}</td>

                        <td>
                            <a href="{{ route('invoice.dcPrint',
                               ['invoice'=>$invoice->id, 'isTaxPayer'=>$isTaxPayer]) }}"
                               class="btn btn-success btn-sm">
                                <i class="fa fa-pencil"></i>
                                <span>Print DC</span>
                            </a>
                        </td>

                        <td>
                            <a href="{{ route('invoice.print',
                               ['invoice'=>$invoice->id, 'isTaxPayer'=>$isTaxPayer]) }}"
                               class="btn btn-warning btn-sm">
                                <i class="fa fa-pencil"></i>
                                <span>Print</span>
                            </a>
                        </td>

                        <!-- edit and delete buttons here -->
                        <td>
{{--                            <a href=""--}}
{{--                               class="btn btn-warning btn-sm">--}}
{{--                                <i class="fa fa-pencil"></i>--}}
{{--                            </a>--}}

                            <a href="#"
                               data-toggle="modal" data-target="#{{$invoice->id}}"
                               class="btn btn-danger btn-sm">
                                <i class="fa fa-trash"></i>
                            </a>

                            <!-- adding the modal -->
                            @modal(['obj'=>$invoice])
                            @slot('modalTitle')
                                Delete Invoice
                            @endslot
                            @slot('modalHeader')
                                Are you sure you want to delete this ??
                            @endslot

                            <form method="POST"
                                  action="">

                                @method('delete')
                                @csrf

                                <input type="submit" class="btn btn-success"
                                       value="Yes">
                                <button type="button" class="btn btn-danger"
                                        data-dismiss="modal">Close</button>
                            </form>
                            @endmodal
                            <!-- adding the modal -->

                        </td>
                        <!-- edit and delete buttons here -->

                    </tr>
                @endforeach
            </table>
        </div>
        @endmytable


    </div>

@endsection







