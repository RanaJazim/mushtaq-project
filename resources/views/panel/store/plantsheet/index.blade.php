@extends('panel.dashboard.main')

@section('title')
    All Plant Sheet Entries
@endsection

@section('content')

    <div id="myheader">

        @alert
        <p>Dashboard > Gate > Display All Plant Sheet Entries</p>
        @endalert

        @btn
        <a href="{{ route('plantsheet.create', ['raw'=>$raw_id]) }}" class="btn btn-primary">Create Plant Sheet</a>
        @endbtn

        @mytable
        <div>
            <table class="table table-bordered">
                <tr>
                    <th>Party Name</th>
                    <th>Date & Time</th>
                    <th>Nali</th>
                    <th>Size</th>
                    <th>Sheet</th>
                    <th>Material In Use</th>
                    <th>Machine</th>
                    <th>Action</th>
                </tr>
                @foreach($plantsheets as $plantsheet)
                    <tr>
                        <td>{{ $plantsheet->partyName }}</td>
                        <td>{{ $plantsheet->created_at }}</td>
                        <td>{{ $plantsheet->nali }}</td>
                        <td>{{ $plantsheet->size }}</td>
                        <td>{{ $plantsheet->sheet }}</td>
                        <td>{{ $plantsheet->rawmaterial->inward->product->productName }}</td>
                        <td>{{ $plantsheet->machine->machineName }}</td>

                        <!-- edit and delete buttons here -->
                        <td>
                            <a href="{{ route('plantsheet.edit',
                                ['raw'=>$raw_id, 'plantsheet'=>$plantsheet->id]) }}"
                               class="btn btn-warning btn-sm">
                                <i class="fa fa-pencil"></i>
                            </a>

                            <a href="#"
                               data-toggle="modal" data-target="#{{$plantsheet->id}}"
                               class="btn btn-danger btn-sm">
                                <i class="fa fa-trash"></i>
                            </a>

                            <!-- adding the modal -->
                            @modal(['obj'=>$plantsheet])
                            @slot('modalTitle')
                                Delete Gate
                            @endslot
                            @slot('modalHeader')
                                Are you sure you want to delete this ??
                            @endslot

                            <form method="POST"
                                  action="{{ route('plantsheet.destroy',
                                ['raw'=>$raw_id, 'plantsheet'=>$plantsheet->id]) }}">

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







