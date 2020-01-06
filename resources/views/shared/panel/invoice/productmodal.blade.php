
<!-- modal for product -->
@modal(['simpleId'=>1])
@slot('modalTitle')
    Invoice
@endslot
@slot('modalHeader')
    Please Select Product Code

    <div>
        <div class="form-inline">
            <label for="productSearch">Search: </label>
            <input type="text" class="form-control" id="productSearch">
        </div>

        <table style="margin-top: 20px" class="table table-bordered">
            <tr>
                <th>Select This Row</th>
                <th>Product Code</th>
                <th>Product Name</th>
            </tr>
            <tbody id="productCodeTable">
                @foreach($products as $product)
                    <tr>
                        <td>
                            <button @click="myProduct({{ $product }})"
                                    class="btn btn-primary btn-xs">
                                Select
                            </button>
                        </td>
                        <td>{{ $product->productCode }}</td>
                        <td>{{ $product->productName }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endslot

<button type="button" class="btn btn-danger"
        data-dismiss="modal">Close</button>

@endmodal
<!-- /modal for product -->

@push('scripts')
    <script src="{{ asset('app/myapp/productsearch.js') }}"></script>
@endpush
