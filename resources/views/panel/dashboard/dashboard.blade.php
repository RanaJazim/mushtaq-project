@extends('panel.dashboard.main')

@section('content')

    <div style="margin-top: 30px">
        <h3>Dashboard</h3>

        <div style="margin-top: 50px" class="row">
            <div class="col-lg-3 col-md-6">
                @mypanel(['panelLink'=>route('gate.create'), 'panelColor'=>'red', 'panelIcon'=>'comments'])
                @slot('panelTitle')
                    Gate
                @endslot
                @endmypanel
            </div>
            <div class="col-lg-3 col-md-6">
                @mypanel(['panelLink'=>route('product.create'), 'panelColor'=>'green', 'panelIcon'=>'facebook'])
                @slot('panelTitle')
                    Product
                @endslot
                @endmypanel
            </div>
            <div class="col-lg-3 col-md-6">
                @mypanel(['panelLink'=>route('party.create'), 'panelColor'=>'yellow', 'panelIcon'=>'comments'])
                @slot('panelTitle')
                    Party
                @endslot
                @endmypanel
            </div>
            <div class="col-lg-3 col-md-6">
                @mypanel(['panelLink'=>route('invoice.open'), 'panelColor'=>'primary', 'panelIcon'=>'comments'])
                @slot('panelTitle')
                    Invoice
                @endslot
                @endmypanel
            </div>
        </div>

    </div>



@endsection

