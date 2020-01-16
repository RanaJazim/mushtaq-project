@extends('panel.dashboard.main')

@section('title')
    All Raw Material Store Entries
@endsection

@section('content')

    <div id="myheader">

        @alert
        <p>Dashboard > Gate > Display All Raw Material Store Entries</p>
        @endalert

        @btn
        <a href="{{ route('gate.create') }}" class="btn btn-primary">Create Raw Material Store Entry</a>
        @endbtn

        @mytable
        <div>
            <table class="table table-bordered">
                <tr>
                    <th>Inward Driver Name </th>
                    <th>Store Name</th>
                    <th>Issue</th>
                    <th>Quantity</th>
                    <th>Inward Remaining</th>
                    <th>Action</th>
                </tr>
                @foreach($rawmaterials as $rawmaterial)
                    <tr>
                        <td>{{ $rawmaterial->inward->driverName }}</td>
                        <td>{{ $rawmaterial->storeName }}</td>
                        <td>{{ $rawmaterial->issue }}</td>
                        <td>{{ $rawmaterial->qty }}</td>
                        <td>{{ $rawmaterial->inward->remaining }}</td>

                        <!-- edit and delete buttons here -->
                        <td>
                            <a href="{{ route('rawmaterial.edit',
                        ['inwardId'=>$rawmaterial->inward->id, 'rawmaterial'=>$rawmaterial->id]) }}"
                               class="btn btn-warning btn-sm">
                                <i class="fa fa-pencil"></i>
                            </a>

                            <a href="#"
                               data-toggle="modal" data-target="#{{$rawmaterial->id}}"
                               class="btn btn-danger btn-sm">
                                <i class="fa fa-trash"></i>
                            </a>

                            <!-- adding the modal -->
                            @modal(['obj'=>$rawmaterial])
                            @slot('modalTitle')
                                Delete Gate
                            @endslot
                            @slot('modalHeader')
                                Are you sure you want to delete this ??
                            @endslot

                            <form method="POST" action="{{ route('rawmaterial.destroy',
                ['inwardId'=>$rawmaterial->inward->id, 'rawmaterial'=>$rawmaterial->id]) }}">

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







