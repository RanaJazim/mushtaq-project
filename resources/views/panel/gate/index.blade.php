@extends('panel.dashboard.main')

@section('title')
    All Employees
@endsection

@section('content')

    <div id="myheader">

        @alert
        <p>Dashboard > Gate > Display All Gate Entries</p>
        @endalert

        @btn
        <a href="{{ route('gate.create') }}" class="btn btn-primary">Create Gate</a>
        @endbtn

        @mytable
            <div>
                <table class="table table-bordered">
                    <tr>
                        <th>Sr No</th>
                        <th>Emp Name</th>
                        <th>Emp CNIC</th>
                        <th>Emp Phone No</th>
                        <th>Emp Address</th>
                        <th>Vehicle No</th>
                        <th>Action</th>
                    </tr>
                    @foreach($gates as $gate)
                        <tr>
                            <td>{{ $gate->id }}</td>
                            <td>{{ $gate->name }}</td>
                            <td>{{ $gate->cnic }}</td>
                            <td>{{ $gate->phoneNumber }}</td>
                            <td>{{ $gate->address }}</td>
                            <td>{{ $gate->vehicleNumber }}</td>

                            <!-- edit and delete buttons here -->
                            <td>
                                <a href="{{ route('gate.edit', ['gate'=>$gate->id]) }}"
                                   class="btn btn-warning btn-sm">
                                    <i class="fa fa-pencil"></i>
                                </a>

                                <a href="#"
                                   data-toggle="modal" data-target="#{{$gate->id}}"
                                   class="btn btn-danger btn-sm">
                                    <i class="fa fa-trash"></i>
                                </a>

                                <!-- adding the modal -->
                                @modal(['obj'=>$gate])
                                    @slot('modalTitle')
                                        Delete Gate
                                    @endslot
                                    @slot('modalHeader')
                                        Are you sure you want to delete this ??
                                    @endslot

                                    <form method="POST"
                                          action="{{ route('gate.destroy',
                                            ['gate' => $gate->id]) }}">

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







