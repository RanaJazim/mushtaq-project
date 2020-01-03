@extends('panel.dashboard.main')

@section('title')
    All Parties
@endsection

@section('content')

    <div id="myheader">

        @alert
        <p>Dashboard > Party > Display All Party Entries</p>
        @endalert

        @btn
        <a href="{{ route('party.create') }}" class="btn btn-primary">Create Party</a>
        @endbtn

        @mytable
        <div>
            <table class="table table-bordered">
                <tr>
                    <th>Buyer's Name</th>
                    <th>Address</th>
                    <th>Phone Number</th>
                    <th>Party Code</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
                @foreach($parties as $party)
                    <tr>
                        <td>{{ $party->buyerName }}</td>
                        <td>{{ $party->address }}</td>
                        <td>{{ $party->phoneNumber }}</td>
                        <td>{{ $party->partyCode }}</td>
                        <td>
                            {{ $party->taxPayer == 1 ? 'Tax Payer' : 'Not Tax Payer' }}
                        </td>

                        <!-- edit and delete buttons here -->
                        <td>
                            <a href="{{ route('party.edit', ['party'=>$party->id]) }}"
                               class="btn btn-warning btn-sm">
                                <i class="fa fa-pencil"></i>
                            </a>

                            <a href="#"
                               data-toggle="modal" data-target="#{{$party->id}}"
                               class="btn btn-danger btn-sm">
                                <i class="fa fa-trash"></i>
                            </a>

                            <!-- adding the modal -->
                            @modal(['obj'=>$party])
                            @slot('modalTitle')
                                Delete Party
                            @endslot
                            @slot('modalHeader')
                                Are you sure you want to delete this ??
                            @endslot

                            <form method="POST"
                                  action="{{ route('party.destroy',
                                            ['party' => $party->id]) }}">

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







