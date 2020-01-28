@extends('panel.dashboard.main')

@section('title')
    All Machines
@endsection

@section('content')

    <div id="myheader">

        @alert
        <p>Dashboard > Machine > Display All Machines</p>
        @endalert

        @btn
        <a href="{{ route('inward.index') }}" class="btn btn-primary">Back</a>
        @endbtn

        @mytable
        <div>
            <table class="table table-bordered">
                <tr>
                    <th>Machine Name</th>
                    <th>Status</th>
                    <th>Issue</th>
                    <th>Qty</th>
                    <th>Create Plant Sheet</th>
                </tr>
                @foreach($rawmaterials as $rawmaterial)
                    <tr>
                        <td>{{ $rawmaterial->machine->machineName }}</td>
                        <td>
                            {{ $rawmaterial->plantsheet ? 'Plant Sheet Already created'
                                : 'Plant Sheet not created yet' }}
                        </td>
                        <td>{{ $rawmaterial->issue }}</td>
                        <td>{{ $inward->productQty }}</td>

                        <td>
                            <a href="{{ route('plantsheet.create', ['inward'=>$inward->id, 'raw'=>$rawmaterial->id]) }}"
                               class="btn btn-primary btn-xs"
                                {{ $rawmaterial->plantsheet ? 'disabled' : ''  }}>
                                Create Plant Sheet
                            </a>
                        </td>

                    </tr>
                @endforeach
            </table>
        </div>
        @endmytable

        <!-- print functionality -->
        <div class="row">
            @if(!$inward->printreport)
                <div class="col-md-4">
                    <a href="{{ route('psReport.create', ['inward'=>$inward->id]) }}"
                       class="btn btn-success"
                        {{ $inward->plantinfo ? '' : 'disabled' }}>
                        Add Some Info to Print Out Plant Sheet
                    </a>
                </div>
            @endif
            @if($inward->printreport)
                <div class="col-md-3">
                    <a href="{{ route('psReport.print', ['inward'=>$inward->id]) }}"
                       class="btn btn-primary">
                        Print Report
                    </a>
                </div>
            @endif
        </div>
        <!-- /print functionality -->

    </div>

@endsection







