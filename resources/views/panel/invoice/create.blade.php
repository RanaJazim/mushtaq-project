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
        <a href="{{ route('invoice.index', ['isTaxPayer'=>$isTaxPayer]) }}"
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
            <form id="myForm" method="POST" action="{{ route('invoice.store') }}">
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
                    <input type="hidden" name="isTaxPayer" value="{{ $isTaxPayer }}">
                    <hr>
                </div>
                    <!-- /adding the product and party information -->



                <div class="form-group">
                    <label for="gpNumber">G.P Number</label>
                    <input type="number" id="gpNumber" class="form-control"
                           name="gpNumber" value="{{ old('gpNumber') }}" required>
                </div>

                <div class="form-group">
                    <label for="remarks">Remarks </label>
                    <input type="text" id="remarks" class="form-control"
                           name="remarks" value="{{ old('remarks') }}" required>
                </div>

                <div class="form-group">
                    <p>Select W / R</p>
                    <div class="form-check">
                        <label class="form-check-label">
                            <input checked type="radio" class="form-check-input"
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
                           name="poNumber" value="{{ old('poNumber') }}" required>
                </div>

                <div class="form-group">
                    <label for="vehicleNumber">Vehicle Number </label>
                    <input type="text" id="vehicleNumber" class="form-control"
                           name="vehicleNumber" value="{{ old('vehicleNumber') }}" required>
                </div>

                <div class="form-group">
                    <label for="size">Size </label>
                    <input type="number" id="size" class="form-control"
                           name="size" value="{{ old('size') }}" required>
                </div>

                <div class="form-group">
                    <label for="rate">Rate </label>
                    <input type="number" id="rate" class="form-control" step="0.01"
                           name="rate" v-model="rate" value="{{ old('rate') }}"
                           id="rate-data" data-rate="{{ old('rate') }}" required>
                </div>

                <div class="form-group">
                    <label for="qty">QTY </label>
                    <input type="number" id="qty" class="form-control" step="0.01"
                           name="qty" v-model="qty" required>
                </div>

                <div class="form-group">
                    <label for="value">Value </label>
                    <input type="number" id="value" class="form-control"
                           name="value" v-model="myValue" readonly>
                </div>

                @if($isTaxPayer == 1)
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
                               name="whtTax" v-model="whtTax" required step="0.01">
                    </div>

                    <div class="form-group">
                        <label for="whtValue">WHT </label>
                        <input type="number" id="whtValue" class="form-control"
                               name="whtValue" v-model="whtValue" readonly>
                    </div>
                @endif

                <div class="form-group">
                    <label for="totalValue">Total Value </label>
                    <input type="number" id="totalValue" class="form-control"
                           name="totalValue" v-model="totalValue" readonly>
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



