<input onclick="myFunction()" style="margin-left: 20px;"
       type="button" class="btn btn-danger" value="{{ $title }}">



@push('scripts')


    <script type="text/javascript">

        function myFunction() {
            document.getElementById("myForm").reset();
        }

    </script>

@endpush
