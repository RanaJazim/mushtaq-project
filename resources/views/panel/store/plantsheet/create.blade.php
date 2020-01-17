@extends('panel.dashboard.main')

@section('title')
    Create Plant Sheet
@endsection

@section('content')

    <div id="myheader">

        @alert
        <p>Dashboard > Plant Sheet > Create Plant Sheet</p>
        @endalert

        @btn
        <a href="{{ route('plantsheet.index', ['raw'=>$rawmaterial->id]) }}" class="btn btn-primary">All Plant Sheet Entries</a>
        @endbtn

        @myform
        <div>
            <form id="myForm" method="POST" action="{{ route('plantsheet.store', ['raw'=>$rawmaterial->id]) }}">
                @csrf

                <input type="hidden" name="rawmaterial_id" value="{{ $rawmaterial->id }}">

                <!-- selecting the machines -->
                <div class="form-group">
                    <label for="machine_id">Select Machine:</label>
                    <select class="form-control" id="machine_id" name="machine_id">
                        @foreach($machines as $machine)
                            <option value="{{$machine->id}}">
                                {{$machine->machineName}}
                            </option>
                        @endforeach
                    </select>
                </div>
                <!-- /selecting the machines -->

                <div class="form-group">
                    <label for="partyName">Party Name</label>
                    <input type="text" id="partyName" class="form-control"
                           name="partyName" value="{{ old('partyName') }}">
                </div>

                <div class="form-group">
                    <label for="size">Size</label>
                    <input type="text" class="form-control" id="size" name="size"
                        value="{{ old('size') }}">
                </div>

                <div class="form-group">
                    <label for="nali">Nali</label>
                    <input type="text" id="nali" class="form-control"
                           name="nali" value="{{ old('nali') }}">
                </div>

                <div class="form-group">
                    <label for="sheet">Sheet (Ply)</label>
                    <input type="text" id="sheet" class="form-control"
                           name="sheet" value="{{ old('sheet') }}">
                </div>

                <div class="form-group">
                    <label for="use">Material in Use</label>
                    <input type="text" class="form-control" id="use"
                        value="{{$rawmaterial->inward->product->productName}}" readonly>
                </div>


                <div class="form-group">
                    <label for="raw_size">Size from Raw Material</label>
                    <input type="text" id="raw_size" value="{{ $rawmaterial->inward->productSize }}"
                        class="form-control" readonly>
                </div>

                <div class="form-group">
                    <label for="qty">Qty from Raw Material</label>
                    <input type="number" id="qty" value="{{ $rawmaterial->inward->productQty }}"
                           class="form-control" readonly>
                </div>

                <div class="form-group">
                    <label for="rate">Rate from Raw Material</label>
                    <input type="number" id="rate" value="{{ $rawmaterial->inward->productRate }}"
                           class="form-control" readonly>
                </div>

                <div class="form-group">
                    <label for="remaining">Remaining from Inward Gate Pass</label>
                    <input type="number" class="form-control" id="remaining"
                        value="{{ $rawmaterial->inward->remaining }}" readonly>
                </div>

                <div class="form-group">
                    <label for="useWeight">Use Weight</label>
                    <input type="number" id="useWeight" class="form-control"
                           name="useWeight" value="{{ old('useWeight') }}">
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







