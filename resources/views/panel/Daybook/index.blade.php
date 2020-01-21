@extends('panel.dashboard.main')

@section('title')
    All Parties
@endsection

@section('content')

    <div id="myheader">

        @alert
        <p>Dashboard > Daybook > Date: {{ $date }}</p>
        @endalert

        @btn
        <a href="{{ route('daybook.create') }}" class="btn btn-primary">Create Daybook</a>
        @endbtn

        <div style="margin-top: 20px" class="alert alert-info">
            <p>Today Opening Balance Starts with == {{ $openingBalance }}</p>
            <p>Today Remaining Balance == {{ $remainingBalance }}</p>
        </div>


        @mytable
        <div>
            <table class="table table-bordered">
                <tr>
                    <th>Sr No</th>
                    <th>Description</th>
                    <th>Price</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
                @foreach($daybooks as $daybook)
                    <tr>
                        <td>{{ $daybook->id }}</td>
                        <td>{{ $daybook->description }}</td>
                        <td>{{ $daybook->price }}</td>
                        <td>
                            {{ $daybook->status == 1 ? 'Opening Balance' : 'Regular Daybook' }}
                        </td>

                        <!-- edit and delete buttons here -->
                        <td>
                            <a {{ $date == date('Y-m-d') ? '' : 'disabled' }} href="#"
                               data-toggle="modal" data-target="#{{ $daybook->id }}"
                               class="btn btn-warning btn-sm">
                                <i class="fa fa-pencil"></i>
                            </a>

                            <!-- adding the modal -->
                            @modal(['obj'=>$daybook])
                            @slot('modalTitle')
                                Update Daybook
                            @endslot
                            @slot('modalHeader')
                                Are you sure you want to update this ??

                                <form method="POST"
                                      action="{{ route('daybook.update', ['daybook'=>$daybook->id]) }}">

                                    @method('PATCH')
                                    @csrf

                                    <div class="form-group">
                                        <label for="openingBalance">Opening Balance </label>
                                        <input readonly type="number" id="openingBalance" class="form-control"
                                               name="openingBalance" value="{{ $remainingBalance }}">
                                    </div>

                                    <div class="form-group">
                                        <label for="description">Description </label>
                                        <input type="text" id="description" class="form-control"
                                               name="description" value="{{ $daybook->description }}">
                                    </div>

                                    <div class="form-group">
                                        <label for="price">Price </label>
                                        <input type="number" id="price" class="form-control"
                                               name="price" value="{{ $daybook->price }}" readonly>
                                    </div>

                                    <div class="form-group">
                                        <label for="new_price">How much value you want to Update!</label>
                                        <input required type="number" id="new_price" class="form-control"
                                                name="new_price" value="{{ old('new_price') }}">
                                    </div>

                                    <input type="submit" class="btn btn-success"
                                           value="Yes">
                                    <button type="button" class="btn btn-danger"
                                            data-dismiss="modal">Close</button>
                                </form>
                            @endslot


                            @endmodal
                            <!-- adding the modal -->

                        </td>
                        <!-- edit and delete buttons here -->

                    </tr>
                @endforeach
            </table>
        </div>
        @endmytable


    </div>

@endsection







