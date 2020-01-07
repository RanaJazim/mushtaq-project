
<!-- modal for party -->
@modal(['simpleId'=>2])
@slot('modalTitle')
    Invoice
@endslot
@slot('modalHeader')
    Please Select Party Code

    <div>
        <div class="form-inline">
            <label for="partySearch">Search: </label>
            <input type="text" class="form-control" id="partySearch">
        </div>

        <table style="margin-top: 20px" class="table table-bordered">
            <tr>
                <th>Select This Row</th>
                <th>Buyer's Name</th>
                <th>Party Code</th>
                <th>Status</th>
            </tr>
            <tbody id="partyCodeTable">
                @foreach($parties as $party)
                    <tr>
                        <td>
                            <button @click="myParty({{ $party }}, {{ $isTaxPayer }})"
                                    class="btn btn-primary btn-xs">
                                Select
                            </button>
                        </td>
                        <td>{{ $party->buyerName }}</td>
                        <td>{{ $party->partyCode }}</td>
                        <td>{{ $party->taxPayer == 1 ? 'Tax Payer' : 'Not Tax Payer' }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endslot

<button type="button" class="btn btn-danger"
        data-dismiss="modal">Close</button>

@endmodal
<!-- /modal for party -->


@push('scripts')
    <script src="{{ asset('app/myapp/partysearch.js') }}"></script>
@endpush
