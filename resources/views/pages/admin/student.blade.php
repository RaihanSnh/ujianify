@extends('pages.admin.base')

@section('header', 'Student')

@section('container')
    <div class="max-w-[200px] mb-4">
        <form action="{{ url('admin/student/create') }}">
        @component('components.button', ['type' => 'submit'])
            Create Student
        @endcomponent
        </form>
    </div>
    <div class="rounded-lg border shadow-lg py-3 px-5 w-[1100px]">
        <div style="max-width: 1100px; overflow-x: auto;">
            <table id="studentTable" class="row-border max-w-[1100px]">
                <thead>
                <tr>
                    <th>Username</th>
                    <th>External ID</th>
                    <th>Full Name</th>
                    <th>Classroom</th>
                    <th>Major</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach(\App\Models\Student::query()->get() as $student)
                    <tr>
                        <td>{{ $student->user()->first()->name }}</td>
                        <td>{{ $student->external_id }}</td>
                        <td>{{ $student->full_name }}</td>
                        <td>{{ $student->classroom()->first()->name }}</td>
                        <td>{{ $student->major()->first()->name }}</td>
                        <td>
                            <div class="flex flex-row items-center gap-x-2 text-xs">
                                <form action="{{ url('admin/student/edit/' . $student->id) }}" method="post">
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
            new DataTable('#studentTable');
        });
    </script>
@endsection
