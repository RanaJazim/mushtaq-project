@extends('panel.dashboard.main')

@section('title')
    All Roll Store Entries
@endsection

@section('content')

    <div id="myheader">

        @alert
        <p>Dashboard > Roll Store > Display All Roll Store Entries</p>
        @endalert

        @btn
        <a href="{{ route('rollstore.create') }}" class="btn btn-primary">Create Roll Store</a>
        @endbtn

        @mytable
        <div>
            <table class="table table-bordered">
                <tr>
                    <th>Size</th>
                    <th>Party Name</th>
                    <th>Quantity</th>
                    <th>Issue</th>
                    <th>Balance</th>
                    <th>Description</th>
                    <th>Action</th>
                </tr>
                @foreach($rollstores as $rollstore)
                    <tr>
                        <td>{{ $rollstore->size }}</td>
                        <td>{{ $rollstore->partyName }}</td>
                        <td>{{ $rollstore->quantity }}</td>
                        <td>{{ $rollstore->issue }}</td>
                        <td>{{ $rollstore->balance }}</td>
                        <td>{{ $rollstore->description }}</td>

                        <!-- edit and delete buttons here -->
                        <td>
                            <a href="{{ route('rollstore.edit', ['rollstore'=>$rollstore->id]) }}"
                               class="btn btn-warning btn-sm">
                                <i class="fa fa-pencil"></i>
                            </a>

                            <a href="#"
                               data-toggle="modal" data-target="#{{$rollstore->id}}"
                               class="btn btn-danger btn-sm">
                                <i class="fa fa-trash"></i>
                            </a>

                            <!-- adding the modal -->
                            @modal(['obj'=>$rollstore])
                            @slot('modalTitle')
                                Delete Roll Store
                            @endslot
                            @slot('modalHeader')
                                Are you sure you want to delete this ??
                            @endslot

                            <form method="POST"
                                  action="{{ route('rollstore.destroy',
                                            ['rollstore' => $rollstore->id]) }}">

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







