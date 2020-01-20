@extends('panel.dashboard.main')

@section('title')
    Select Machine
@endsection

@section('content')

    <div id="myheader">

        @alert
        <p>Dashboard > Raw Material Store > Select Machine & Issue some Price</p>
        @endalert

        @btn
        <a href="{{ route('inward.index') }}" class="btn btn-primary">Back</a>
        @endbtn

        @myform
        <div>
            <form id="myForm" method="POST" action="{{ route('machine.store') }}">
                @csrf

                <input type="hidden" name="inward_id" value="{{ $inward->id }}">

                <div class="form-group">
                    <label for="machine_id">Select Machine:</label>
                    <select class="form-control" id="machine_id" name="machine_id">
                        @foreach($machines as $machine)
                            <option value="{{ $machine->id }}">
                                {{ $machine->machineName }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label for="qty">Quantity</label>
                    <input type="number" id="qty" class="form-control"
                           name="qty" value="{{ $inward->productQty }}"
                           readonly>
                </div>

                <div class="form-group">
                    <label for="issue">Issue</label>
                    <input type="number" id="issue" class="form-control"
                           name="issue" value="{{ old('issue') }}">
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







