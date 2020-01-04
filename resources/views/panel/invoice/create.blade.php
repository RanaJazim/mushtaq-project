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
        <a href="{{ route('product.index') }}" class="btn btn-primary">All Invoice Entries</a>
        @endbtn

        <!-- Display Buttons for Selecting Product and Party Code -->
        @include('shared.panel.invoice.modalbutton')
        @include('shared.panel.invoice.productmodal')
        @include('shared.panel.invoice.partymodal')
        <!-- /Display Buttons for Selecting Product and Party Code -->

        <!-- checking if product and party code is selected or not -->
        <div style="margin-top: 10px">
            <p v-if="!productCode" class="alert alert-danger">
                Please Select Product Code
            </p>
            <p v-if="!partyCode" class="alert alert-danger">
                Please Select Party Code
            </p>
        </div>
        <!-- end checking condition -->

        @myform
        <div>
            <form id="myForm" method="POST" action="{{ route('product.store') }}">
                @csrf

                <div v-if="isAvailable">
                    <div class="form-group">
                        <label for="partyCode">Party Code</label>
                        <input type="text" class="form-control" v-model="">
                    </div>
                </div>

                <div class="form-group">
                    <label for="gpNumber">G.P Number</label>
                    <input type="number" id="gpNumber" class="form-control"
                           name="gpNumber" value="{{ old('gpNumber') }}">
                </div>

                <div class="form-group">
                    <label for="remarks">Remarks </label>
                    <input type="text" id="remarks" class="form-control"
                           name="remarks" value="{{ old('remarks') }}">
                </div>

                <div class="form-group">
                    <p>Select W / R</p>
                    <div class="form-check">
                        <label class="form-check-label">
                            <input type="radio" class="form-check-input"
                                   name="wrStatus" value="W">W
                        </label>
                    </div>
                    <div class="form-check">
                        <label class="form-check-label">
                            <input type="radio" class="form-check-input"
                                   name="wrStatus" value="R">R
                        </label>
                    </div>
                </div>

                <div class="form-group">
                    <label for="poNumber">P.O Number </label>
                    <input type="number" id="poNumber" class="form-control"
                           name="poNumber" value="{{ old('poNumber') }}">
                </div>

                <div class="form-group">
                    <label for="vehicleNumber">Vehicle Number </label>
                    <input type="text" id="vehicleNumber" class="form-control"
                           name="vehicleNumber" value="{{ old('vehicleNumber') }}">
                </div>

                <div class="form-group">
                    <label for="size">Size </label>
                    <input type="number" id="size" class="form-control"
                           name="size" value="{{ old('size') }}">
                </div>

                <div class="form-group">
                    <label for="rate">Rate </label>
                    <input type="number" id="rate" class="form-control"
                           name="rate" v-model="rate">
                </div>

                <div class="form-group">
                    <label for="qty">QTY </label>
                    <input type="number" id="qty" class="form-control"
                           name="qty" v-model="qty">
                </div>

                <div class="form-group">
                    <label for="value">Value </label>
                    <input type="number" id="value" class="form-control"
                           name="value" v-model="myValue" readonly>
                </div>

                <div class="form-group">
                    <label for="st">S.T % </label>
                    <input readonly type="number" id="st" class="form-control"
                           v-model="st">
                </div>

                <div class="form-group">
                    <label for="stTaxValue">S.Tax </label>
                    <input type="number" id="stTaxValue" class="form-control"
                           name="stTaxValue" v-model="saleTaxValue" readonly>
                </div>

                <div class="form-group">
                    <label for="whtTax">WHT % </label>
                    <input type="number" id="whtTax" class="form-control"
                           name="whtTax" v-model="whtTax">
                </div>

                <div class="form-group">
                    <label for="whtValue">WHT </label>
                    <input type="number" id="whtValue" class="form-control"
                           name="whtValue" v-model="whtValue" readonly>
                </div>

                <div class="form-group">
                    <label for="totalValue">Total Value </label>
                    <input type="number" id="totalValue" class="form-control"
                           name="totalValue" v-model="totalValue" readonly>
                </div>

                <div style="margin-top: 20px"></div>

                <input type="submit" class="btn btn-success">
                @btnclear(['title'=>'Clear Fields'])
                @endbtnclear
            </form>
        </div>
        @endmyform

        @include('error')

    </div>

@endsection

@push('scripts')

    <script src="{{ asset('app/js/myvue.js') }}"></script>
    <script src="{{ asset('app/myapp/invoiceCreate.js') }}"></script>

@endpush



