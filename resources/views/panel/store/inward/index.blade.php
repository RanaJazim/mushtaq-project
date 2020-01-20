@extends('panel.dashboard.main')

@section('title')
    Raw Material Store
@endsection

@section('content')

    <div id="myheader">

        @alert
        <p>Dashboard > Raw Material Store > Display All Entries</p>
        @endalert

        @btn
        <a href="{{ route('inward.create') }}" class="btn btn-primary">Create Inward</a>
        @endbtn

        @mytable
        <div>
            <table class="table table-bordered">
                <tr>
                    <th>Product Color</th>
                    <th>Product Size</th>
                    <th>Product Qty</th>
                    <th>Product Rate</th>
                    <th>Product TotalPrice</th>
                    <th>Select Machine</th>
                    <th>Machine List</th>
                    <th>Action</th>
                </tr>
                @foreach($inwards as $inward)
                    <tr>
                        <td>{{ $inward->productColor }}</td>
                        <td>{{ $inward->productSize }}</td>
                        <td>{{ $inward->productQty }}</td>
                        <td>{{ $inward->productRate }}</td>
                        <td>{{ $inward->totalPrice }}</td>

                        <td>
                            <a href="{{ route('machine.select', ['inward'=>$inward->id]) }}">
                                Select Machine
                            </a>
                        </td>

                        <td>
                            <a href="{{ route('machine.index', ['inward'=>$inward->id]) }}"
                               class="btn btn-primary btn-xs">
                                <i class="fa fa-eye"></i>
                                <span>All Machines</span>
                            </a>
                        </td>

                        <!-- edit and delete buttons here -->
                        <td>
                            <a href="{{ route('inward.edit', ['inward'=>$inward->id]) }}"
                               class="btn btn-warning btn-sm">
                                <i class="fa fa-pencil"></i>
                            </a>

                            <a href="#"
                               data-toggle="modal" data-target="#{{$inward->id}}"
                               class="btn btn-danger btn-sm">
                                <i class="fa fa-trash"></i>
                            </a>

                            <!-- adding the modal -->
                            @modal(['obj'=>$inward])
                            @slot('modalTitle')
                                Delete Inward
                            @endslot
                            @slot('modalHeader')
                                Are you sure you want to delete this ??
                            @endslot

                            <form method="POST"
                                  action="{{ route('inward.destroy',
                                            ['inward' => $inward->id]) }}">

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







