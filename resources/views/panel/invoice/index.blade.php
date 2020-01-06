@extends('panel.dashboard.main')

@section('title')
    All Products
@endsection

@section('content')

    <div id="">

        @alert
        <p>Dashboard > Product > Display All Product Entries</p>
        @endalert

        @btn
        <a href="/invoice/create?isTaxPayer={{ $isTaxPayer }}" class="btn btn-primary">Create Product</a>
        @endbtn

        @mytable
        <div>
            <table class="table table-bordered">
                <tr>
                    <th>Buyer's Name</th>
                    <th>Invoice Section</th>
                </tr>
                @foreach($parties as $party)
                    <tr>
                        <td>{{ $party->buyerName }}</td>
                        <td>
                            <a href="">Invoice</a>
                        </td>
                    </tr>
                @endforeach
            </table>
        </div>
        @endmytable




    </div>

@endsection





