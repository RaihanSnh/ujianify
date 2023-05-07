<input type="text" id="{{ $id }}" name="{{ $name }}" class="border rounded border-gray-300 shadow px-2 py-1 focus:border-blue-300">

@section('scripts')
    @parent

    <script>
        $(document).ready(function () {
            $("#{{ $id }}").datetimepicker();
        });
    </script>
@endsection
