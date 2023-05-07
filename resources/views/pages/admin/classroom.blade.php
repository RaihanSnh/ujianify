@extends('pages.admin.base')

@section('header', 'Classroom')

@section('container')
    <div class="max-w-[200px] mb-4">
        <form action="{{ url('admin/classroom/create') }}">
        @component('components.button', ['type' => 'submit'])
            Create Classroom
        @endcomponent
        </form>
    </div>
    <div class="rounded-lg border shadow-lg py-3 px-5 w-[900px]">
        <div style="max-width: 900px; overflow-x: auto;">
            <table id="classroomTable" class="row-border max-w-[900px]">
                <thead>
                <tr>
                    <th>Classroom Name</th>
                    <th>Major</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach(\App\Models\Classroom::query()->get() as $classroom)
                    <tr>
                        <td>{{ $classroom->name }}</td>
                        <td>{{ $classroom->major()->first()->name }}</td>
                        <td>
                            <div class="flex flex-row items-center gap-x-2 text-xs">
                                <form action="{{ url('admin/classroom/delete/' . $classroom->id) }}" method="post">
                                    @csrf
                                    <button class="flex items-center gap-x-1 px-2 py-0.5 rounded-lg bg-red-900 hover:bg-red-800 text-gray-50">
                                        <span class="material-symbols-outlined">
                                            delete
                                        </span>
                                    </button>
                                </form>
                                <form action="{{ url('admin/classroom/edit/' . $classroom->id) }}" method="post">
                                    @csrf
                                    <button class="flex items-center gap-x-1 px-2 py-0.5 rounded-lg bg-yellow-600 hover:bg-yellow-500 text-gray-50">
                                        <span class="material-symbols-outlined">
                                            edit
                                        </span>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection

@section('scripts')
    @parent

    <script>
        $(document).ready(function () {
            new DataTable('#classroomTable');
        });
    </script>
@endsection
