@extends('pages.admin.base')

@section('header', 'Teacher')

@section('container')
    <div class="max-w-[200px] mb-4">
        <form action="{{ url('admin/teacher/create') }}">
            <x-button type="submit">Create Teacher</x-button>
        </form>
    </div>
    <div class="rounded-lg border shadow-lg py-3 px-5 w-[900px]">
        <div style="max-width: 900px; overflow-x: auto;">
            <table id="teacherTable" class="row-border max-w-[900px]">
                <thead>
                <tr>
                    <th>Username</th>
                    <th>External ID</th>
                    <th>Full Name</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach(\App\Models\Teacher::query()->get() as $teacher)
                    <tr>
                        <td>{{ $teacher->user()->first()->name }}</td>
                        <td>{{ $teacher->external_id }}</td>
                        <td>{{ $teacher->full_name }}</td>
                        <td>
                            <div class="flex flex-row items-center gap-x-2 text-xs">
                                <form action="{{ url('admin/teacher/delete/' . $teacher->id) }}">
                                    <button class="flex items-center gap-x-1 px-2 py-0.5 rounded-lg bg-red-900 hover:bg-red-800 text-gray-50">
                                        <span class="material-symbols-outlined">
                                            delete
                                        </span>
                                    </button>
                                </form>
                                <form action="{{ url('admin/teacher/edit/' . $teacher->id) }}">
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
            new DataTable('#teacherTable');
        });
    </script>
@endsection
