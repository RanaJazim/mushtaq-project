
<div style="margin-top: 20px">
    @if(count($errors) > 0)

        <ul class="alert alert-danger">
            @foreach($errors->all() as $error)

                <li>{{ $error }}</li>

            @endforeach
        </ul>

    @endif
</div>
