@extends('panel.dashboard.main')

@section('title')
    Create Employees
@endsection

@section('content')

    <div id="myheader">

        @alert
        <p>Dashboard > Report > Create Report Entries</p>
        @endalert

        @btn
        <a href="{{ route('machine.index', ['inward'=>$inward->id]) }}" class="btn btn-primary">Back</a>
        @endbtn

        @include('error')

        @myform
        <div>
            <form id="myForm" method="POST" action="{{ route('psReport.store',
                    ['inward'=>$inward->id]) }}">
                @csrf

                <input type="hidden" name="inward_id" value="{{ $inward->id }}">

                <div class="form-group">
                    <label for="gas">Gas Rate</label>
                    <input type="number" id="gas" class="form-control"
                           name="gas" value="{{ old('gas') }}">
                </div>

                <div class="form-group">
                    <label for="perGas">Per Gas Rate</label>
                    <input type="number" id="perGas" class="form-control"
                           name="perGas" value="{{ old('perGas') }}">
                </div>

                <div class="form-group">
                    <label for="starchUse">Starch Use Rate</label>
                    <input type="number" id="starchUse" class="form-control"
                           name="starchUse" value="{{ old('starchUse') }}">
                </div>

                <div class="form-group">
                    <label for="perStarchUse">Per Starch Use Rate</label>
                    <input type="number" id="perStarchUse" class="form-control"
                           name="perStarchUse" value="{{ old('perStarchUse') }}">
                </div>

                <div class="form-group">
                    <label for="causticSoda">Caustic Soda Rate</label>
                    <input type="number" id="causticSoda" class="form-control"
                           name="causticSoda" value="{{ old('causticSoda') }}">
                </div>

                <div class="form-group">
                    <label for="perCausticSoda">Per Caustic Soda Rate</label>
                    <input type="number" id="perCausticSoda" class="form-control"
                           name="perCausticSoda" value="{{ old('perCausticSoda') }}">
                </div>

                <div class="form-group">
                    <label for="borex">Borex Rate</label>
                    <input type="number" id="borex" class="form-control"
                           name="borex" value="{{ old('borex') }}">
                </div>

                <div class="form-group">
                    <label for="perBorex">Per Borex Rate</label>
                    <input type="number" id="perBorex" class="form-control"
                           name="perBorex" value="{{ old('perBorex') }}">
                </div>

                <div class="form-group">
                    <label for="wood">Wood Rate</label>
                    <input type="number" id="wood" class="form-control"
                           name="wood" value="{{ old('wood') }}">
                </div>

                <div class="form-group">
                    <label for="perWood">Per Wood Rate</label>
                    <input type="number" id="perWood" class="form-control"
                           name="perWood" value="{{ old('perWood') }}">
                </div>

                <div class="form-group">
                    <label for="electricity">Electricity</label>
                    <input type="number" id="electricity" class="form-control"
                           name="electricity" value="{{ old('electricity') }}">
                </div>

                <div class="form-group">
                    <label for="labSheet">Lab / Sheet</label>
                    <input type="number" id="labSheet" class="form-control"
                           name="labSheet" value="{{ old('labSheet') }}">
                </div>

                <div class="form-group">
                    <label for="office">Office</label>
                    <input type="number" id="office" class="form-control"
                           name="office" value="{{ old('office') }}">
                </div>

                <div class="form-group">
                    <label for="labCtn">Lab / Ctn</label>
                    <input type="number" id="labCtn" class="form-control"
                           name="labCtn" value="{{ old('labCtn') }}">
                </div>

                <div class="form-group">
                    <label for="priCh">Pri Ch</label>
                    <input type="number" id="priCh" class="form-control"
                           name="priCh" value="{{ old('priCh') }}">
                </div>

                <div class="form-group">
                    <label for="pinCh">Pin Ch</label>
                    <input type="number" id="pinCh" class="form-control"
                           name="pinCh" value="{{ old('pinCh') }}">
                </div>


                <input type="submit" class="btn btn-success">
                @btnclear(['title'=>'Clear Fields'])
                @endbtnclear
            </form>
        </div>
        @endmyform



    </div>

@endsection







