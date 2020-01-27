@extends('panel.dashboard.main')

@section('title')
    All Entries of Final Finish Store
@endsection

@section('content')

    <div id="myheader">

        @alert
        <p>Dashboard > Final Finish Store > Display All Final Finish Store Entries</p>
        @endalert

        @btn
        <a href="{{ route('gate.create') }}" class="btn btn-primary">Create Final
            Finish Store</a>
        @endbtn

        @mytable
        <div>
            <table class="table table-bordered">
                <tr>
                    <th>Sr No</th>
                    <th>Party Name</th>
                    <th>Description</th>
                    <th>Size</th>
                    <th>Color</th>
                    <th>Quantity</th>
                    <th>Waste</th>
                    <th>Balance</th>
                    <th>Action</th>
                </tr>
                @foreach($stores as $store)
                    <tr>
                        <td>{{ $store->id }}</td>
                        <td>{{ $store->partyName }}</td>
                        <td>{{ $store->description }}</td>
                        <td>{{ $store->size }}</td>
                        <td>{{ $store->color }}</td>
                        <td>{{ $store->quantity }}</td>
                        <td>{{ $store->waste }}</td>
                        <td>{{ $store->waste * $store->quantity }}</td>

                        <!-- edit and delete buttons here -->
                        <td>
                            <a href="{{ route('finishstore.edit', ['id'=>$store->id]) }}"
                               class="btn btn-warning btn-sm">
                                <i class="fa fa-pencil"></i>
                            </a>

                            <a href="#"
                               data-toggle="modal" data-target="#{{$store->id}}"
                               class="btn btn-danger btn-sm">
                                <i class="fa fa-trash"></i>
                            </a>

                            <!-- adding the modal -->
                            @modal(['obj'=>$store])
                            @slot('modalTitle')
                                Delete Final Finish Store
                            @endslot
                            @slot('modalHeader')
                                Are you sure you want to delete this ??
                            @endslot

                            <form method="POST"
                                  action="{{ route('finishstore.destroy',
                                            ['id'=>$store->id]) }}">

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







