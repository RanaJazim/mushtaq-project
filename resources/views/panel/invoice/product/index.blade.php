@extends('panel.dashboard.main')

@section('title')
    All Products
@endsection

@section('content')

    <div id="myheader">

        @alert
        <p>Dashboard > Product > Display All Product Entries</p>
        @endalert

        @btn
        <a href="{{ route('product.create') }}" class="btn btn-primary">Create Product</a>
        @endbtn

        @mytable
        <div>
            <table class="table table-bordered">
                <tr>
                    <th>Product Code</th>
                    <th>Product Name</th>
                    <th>Action</th>
                </tr>
                @foreach($products as $product)
                    <tr>
                        <td>{{ $product->productCode }}</td>
                        <td>{{ $product->productName }}</td>

                        <!-- edit and delete buttons here -->
                        <td>
                            <a href="{{ route('product.edit', ['product'=>$product->id]) }}"
                               class="btn btn-warning btn-sm">
                                <i class="fa fa-pencil"></i>
                            </a>

                            <a href="#"
                               data-toggle="modal" data-target="#{{$product->id}}"
                               class="btn btn-danger btn-sm">
                                <i class="fa fa-trash"></i>
                            </a>

                            <!-- adding the modal -->
                            @modal(['obj'=>$product])
                            @slot('modalTitle')
                                Delete Product
                            @endslot
                            @slot('modalHeader')
                                Are you sure you want to delete this ??
                            @endslot

                            <form method="POST"
                                  action="{{ route('product.destroy',
                                            ['product' => $product->id]) }}">

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







