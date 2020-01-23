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
        <a href="{{ route('poinfo.create', ['po'=>$po->id]) }}" class="btn btn-primary">Back</a>
        @endbtn

        @mytable
        <div>
            <table class="table table-bordered">
                <tr>
                    <th>Quantity Order</th>
                    <th>OGP Number</th>
                    <th>Send Quantity</th>
                </tr>
                @foreach($po->poinfos as $poinfo)
                    <tr>
                        <td>{{ $po->quantityOrder }}</td>
                        <td>{{ $poinfo->ogpNumber }}</td>
                        <td>{{ $poinfo->sendQuantity }}</td>
                    </tr>
                @endforeach
            </table>
        </div>
        @endmytable


    </div>

@endsection







