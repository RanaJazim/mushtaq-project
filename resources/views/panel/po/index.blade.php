@extends('panel.dashboard.main')

@section('title')
    All PO
@endsection

@section('content')

    <div id="myheader">

        @alert
        <p>Dashboard > PO > Display All PO's of {{ $party->buyerName }}</p>
        @endalert

        @btn
        <a href="{{ route('po.create', ['party'=>$party->id]) }}"
           class="btn btn-primary">
            Create PO
        </a>
        @endbtn

        @mytable
        <div>
            <table class="table table-bordered">
                <tr>
                    <th>Sr No</th>
                    <th>Date</th>
                    <th>Item Name</th>
                    <th>Size</th>
                    <th>Color</th>
                    <th>Quantity Order</th>
                    <th>Outward</th>
                    <th>Detail</th>
                    <td>Action</td>
                </tr>
                @foreach($party->pos as $po)
                    <tr>
                        <td>{{ $po->id }}</td>
                        <td>{{ $po->date }}</td>
                        <td>{{ $po->itemName }}</td>
                        <td>{{ $po->size }}</td>
                        <td>{{ $po->color }}</td>
                        <td>{{ $po->quantityOrder }}</td>
                        <td>
                            <a href="{{ route('poinfo.create', ['po'=>$po->id]) }}"
                               class="btn btn-primary btn-sm">
                                Outward
                            </a>
                        </td>
                        <td>
                            <a href="{{ route('poinfo.index', ['po'=>$po->id]) }}"
                               class="btn btn-warning btn-sm">
                                Detail
                            </a>
                        </td>

                        <td>
                            <a href="#" data-toggle="modal" data-target="#{{$po->id}}"
                                class="btn btn-danger btn-sm">
                                Delete
                            </a>
                        </td>

                        <!-- adding the modal -->
                        @modal(['obj'=>$po])
                        @slot('modalTitle')
                            Delete PO
                        @endslot
                        @slot('modalHeader')
                            Are you sure you want to delete this ??

                            <form style="margin-top: 30px" method="POST"
                                  action="{{ route('po.destroy', ['po'=>$po->id]) }}">

                                @method('delete')
                                @csrf

                                <input type="submit" class="btn btn-success"
                                       value="Yes">
                                <button type="button" class="btn btn-danger"
                                        data-dismiss="modal">Close</button>
                            </form>
                        @endslot
                        @endmodal
                        <!-- adding the modal -->

                    </tr>
                @endforeach
            </table>
        </div>
        @endmytable


    </div>

@endsection







