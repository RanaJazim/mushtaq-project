@extends('panel.dashboard.main')

@section('title')
    Edit Plant Sheet
@endsection

@section('content')

    <div id="myheader">

        @alert
        <p>Dashboard > Plant Sheet > Edit Plant Sheet</p>
        @endalert


        @myform
        <div>
            <form id="myForm" method="POST" action="{{ route('plantsheet.update',
                    ['raw'=>$plantsheet->rawmaterial->id, 'plantsheet'=>$plantsheet->id]) }}">
                @csrf
                @method('PATCH')

                <input type="hidden" name="rawmaterial_id" value="{{ $plantsheet->rawmaterial->id }}">

                <!-- selecting the machines -->
                <div class="form-group">
                    <label for="machine_id">Select Machine:</label>
                    <select class="form-control" id="machine_id" name="machine_id">
                        @foreach($machines as $machine)
                            <option {{ $machine->id == $plantsheet->id ? 'selected' : '' }}
                                    value="{{$machine->id}}">
                                {{$machine->machineName}}
                            </option>
                        @endforeach
                    </select>
                </div>
                <!-- /selecting the machines -->

                <div class="form-group">
                    <label for="partyName">Party Name</label>
                    <input type="text" id="partyName" class="form-control"
                           name="partyName" value="{{ $plantsheet->partyName }}">
                </div>

                <div class="form-group">
                    <label for="size">Size</label>
                    <input type="text" class="form-control" id="size" name="size"
                           value="{{ $plantsheet->size }}">
                </div>

                <div class="form-group">
                    <label for="nali">Nali</label>
                    <input type="text" id="nali" class="form-control"
                           name="nali" value="{{ $plantsheet->nali }}">
                </div>

                <div class="form-group">
                    <label for="sheet">Sheet (Ply)</label>
                    <input type="text" id="sheet" class="form-control"
                           name="sheet" value="{{ $plantsheet->sheet }}">
                </div>

                <div class="form-group">
                    <label for="use">Material in Use</label>
                    <input type="text" class="form-control" id="use"
                           value="{{$plantsheet->rawmaterial->inward->product->productName}}" readonly>
                </div>


                <div class="form-group">
                    <label for="raw_size">Size from Raw Material</label>
                    <input type="text" id="raw_size" value="{{ $plantsheet->rawmaterial->inward->productSize }}"
                           class="form-control" readonly>
                </div>

                <div class="form-group">
                    <label for="qty">Qty from Raw Material</label>
                    <input type="number" id="qty" value="{{ $plantsheet->rawmaterial->inward->productQty }}"
                           class="form-control" readonly>
                </div>

                <div class="form-group">
                    <label for="rate">Rate from Raw Material</label>
                    <input type="number" id="rate" value="{{ $plantsheet->rawmaterial->inward->productRate }}"
                           class="form-control" readonly>
                </div>

                <div class="form-group">
                    <label for="remaining">Remaining from Inward Gate Pass</label>
                    <input type="number" class="form-control" id="remaining"
                           value="{{ $plantsheet->rawmaterial->inward->remaining }}" readonly>
                </div>

                <div class="form-group">
                    <label for="useWeight">Use Weight</label>
                    <input type="number" id="useWeight" class="form-control"
                           name="useWeight" value="{{ $plantsheet->useWeight }}">
                </div>


                <input type="submit" class="btn btn-success">
                @btnclear(['title'=>'Clear Fields'])
                @endbtnclear
            </form>
        </div>
        @endmyform

        @include('error')

    </div>

@endsection







