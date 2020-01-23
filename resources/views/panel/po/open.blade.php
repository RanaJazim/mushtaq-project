@extends('panel.dashboard.main')

@section('title')
    Select PO
@endsection

@section('content')

    <div id="myheader">

        @alert
        <p>Dashboard > PO > Select PO</p>
        @endalert

        @btn
        <a href="{{ route('party.create') }}" class="btn btn-primary">Create Party</a>
        @endbtn

        @mytable
        <div>
            <table class="table table-bordered">
                <tr>
                    <th>Buyer's Name</th>
                    <th>Status</th>
                    <th>Create PO</th>
                    <th>Check Detail</th>
                </tr>
                @foreach($parties as $party)
                    <tr>
                        <td>{{ $party->buyerName }}</td>
                        <td>
                            {{ $party->taxPayer == 1 ? 'Tax Payer' : 'Not Tax Payer' }}
                        </td>
                        <td>
                            <a href="{{ route('po.create', ['party'=>$party->id]) }}"
                               class="btn btn-primary btn-xs">
                                Create PO
                            </a>
                        </td>
                        <td>
                            <a href="{{ route('po.index', ['party'=>$party->id]) }}"
                               class="btn btn-warning btn-xs">
                                Check Detail of PO
                            </a>
                        </td>
                    </tr>
                @endforeach
            </table>
        </div>
        @endmytable


    </div>

@endsection







