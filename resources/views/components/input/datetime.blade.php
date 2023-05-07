@props(['id' => 'datetimepicker_' . $name])

<input type="text" id="{{ $id }}" name="{{ $name }}" class="border rounded border-gray-500 px-2 focus:border-blue-300">

@section('scripts')
    @parent

    <script>
        $(document).ready(function () {
            $("#{{ $id }}").datetimepicker();

            $("#{{ $id }}").on("change",function(){
                var selected = $(this).val();
                alert(selected);
            });
        });
    </script>
@endsection
