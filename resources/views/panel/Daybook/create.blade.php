@extends('panel.dashboard.main')

@section('title')
    Create Party
@endsection

@section('content')

    <div id="">

        @alert
        <p>Dashboard > Party > Create Party</p>
        @endalert

        @btn
        <a href="#" data-toggle="modal" data-target="#1"
           class="btn btn-primary">
            All Party Entries
        </a>
        @endbtn

        <!-- adding the modal -->
        @modal(['simpleId'=>1])
        @slot('modalTitle')
            Daybook
        @endslot
        @slot('modalHeader')
           Please Select Date for View the Daybook

            <form method="GET"
                  action="{{ route('daybook.index') }}">

                <div class="form-group">
                    <label for="selectDate">Please Select Date</label>
                    <input type="date" class="form-control" name="selectDate"
                           id="selectDate" value="{{ old('selectDate') }}">
                </div>

                <input type="submit" class="btn btn-success"
                       value="Yes">
                <button type="button" class="btn btn-danger"
                        data-dismiss="modal">Close</button>
            </form>
        @endslot
        @endmodal
        <!-- adding the modal -->

        @myform
        <div>
            <form id="myForm" method="POST" action="{{ route('daybook.store') }}">
                @csrf

                <div class="form-check">
                    <label class="form-check-label">
                        <input type="checkbox" name="status"
                               class="form-check-input">
                        Add Opening Balance
                    </label>
                </div>

                <div style="margin-top: 20px"></div>

                <div class="form-group">
                    <label for="openingBalance">Opening Balance </label>
                    <input readonly type="number" id="openingBalance" class="form-control"
                           name="openingBalance" value="{{ $openingBalance }}">
                </div>

                <div class="form-group">
                    <label for="description">Description </label>
                    <input type="text" id="description" class="form-control"
                           name="description" value="{{ old('description') }}">
                </div>

                <div class="form-group">
                    <label for="price">Price </label>
                    <input type="number" id="price" class="form-control"
                           name="price" value="{{ old('price') }}">
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




