@extends('panel.dashboard.main')

@section('title')
    Create Invoice
@endsection

@section('content')

    <div id="invoice">

        @alert
        <p>Dashboard > Invoice > Create Invoice</p>
        @endalert

        @btn
        <a href="{{ route('inward.index') }}"
           class="btn btn-primary">
            All Invoice Entries
        </a>
        @endbtn

        <!-- Display Buttons for Selecting Product and Party Code -->
    @include('shared.panel.invoice.modalbutton')
    @include('shared.panel.invoice.productmodal')
    @include('shared.panel.invoice.partymodal')
    <!-- /Display Buttons for Selecting Product and Party Code -->

        <!-- checking if product and party code is selected or not -->
        <div style="margin-top: 10px">
            <p v-if="!product" class="alert alert-danger">
                Please Select Product Code
            </p>
            <p v-if="!party" class="alert alert-danger">
                Please Select Party Code
            </p>
        </div>
        <!-- end checking condition -->



        @myform
        <div>
            <form id="myForm" method="POST" action="{{ route('inward.store') }}">
            @csrf

            <!-- adding the product and party information -->
                <div v-if="product && party">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Party Code</label>
                                <input type="text" class="form-control"
                                       :value="party.partyCode" readonly>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Party Name</label>
                                <input type="text" class="form-control"
                                       :value="party.buyerName" readonly>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Product Code</label>
                                <input type="text" class="form-control"
                                       :value="product.productCode" readonly>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Product Name</label>
                                <input type="text" class="form-control"
                                       :value="product.productName" readonly>
                            </div>
                        </div>
                    </div>

                    <input type="hidden" name="product_id" :value="product.id">
                    <input type="hidden" name="party_id" :value="party.id">
                    <hr>
                </div>
                <!-- /adding the product and party information -->



                <div class="form-group">
                    <label for="productColor">Product Color</label>
                    <input type="text" id="productColor" class="form-control"
                           name="productColor" value="{{ old('productColor') }}" >
                </div>

                <div class="form-group">
                    <label for="productSize">Product Size </label>
                    <input type="text" id="productSize" class="form-control"
                           name="productSize" value="{{ old('productSize') }}" >
                </div>

                <div class="form-group">
                    <label for="productQty">Product Quantity </label>
                    <input type="number" id="productQty" class="form-control"
                           name="productQty" value="{{ old('productQty') }}" >
                </div>

                <div class="form-group">
                    <label for="productRate">Product Rate </label>
                    <input type="number" id="productRate" class="form-control"
                           name="productRate" value="{{ old('productRate') }}" >
                </div>

                <div class="form-group">
                    <label for="vehicleNumber">Vehicle Number </label>
                    <input type="text" id="vehicleNumber" class="form-control"
                           name="vehicleNumber" value="{{ old('vehicleNumber') }}" >
                </div>

                <div class="form-group">
                    <label for="driverName">Drive Name </label>
                    <input type="text" id="driverName" class="form-control" step="0.01"
                           name="driverName" value="{{ old('driverName') }}">
                </div>

                <div class="form-group">
                    <label for="deliveredBy">Delivered By </label>
                    <input type="text" id="deliveredBy" class="form-control"
                           name="deliveredBy" value="{{ old('deliveredBy') }}">
                </div>

                <div class="form-group">
                    <label for="preparedBy">Prepared By </label>
                    <input type="text" id="preparedBy" class="form-control"
                           name="preparedBy" value="{{ old('preparedBy') }}">
                </div>


                <div style="margin-top: 20px"></div>

                <input :disabled="!(product && party)"
                       type="submit" class="btn btn-success">

            </form>
        </div>
        @endmyform

        @include('error')

    </div>

@endsection

@push('scripts')

    <script src="{{ asset('app/js/myvue.js') }}"></script>
    <script src="https://unpkg.com/vue-router/dist/vue-router.js"></script>
    <script src="{{ asset('app/myapp/invoiceCreate.js') }}"></script>

@endpush



