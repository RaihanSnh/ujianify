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
                                <x-modal-open id="delete">
                                    <button
                                        class="flex items-center gap-x-1 px-2 py-0.5 rounded-lg bg-red-900 hover:bg-red-800 text-gray-50">
                                        <span class="material-symbols-outlined">
                                            delete
                                        </span>
                                    </button>
                                </x-modal-open>

                                <x-modal id="delete">
                                    <h1 class="mb-4">Are you sure?</h1>
                                    <hr>
                                    <div class="flex mt-5">
                                        <form action="{{ url('admin/teacher/delete/' . $teacher->id) }}">
                                            @csrf
                                            @method('DELETE')
                                            <button
                                                class="items-center gap-x-1 px-2 py-2 rounded-lg bg-blue-500 hover:bg-blue-400 text-gray-50 mr-5 w-60">Yes</button>
                                        </form>
                                        <button
                                            class="items-center gap-x-1 px-2 py-2 rounded-lg bg-red-900 hover:bg-red-800 text-gray-50 w-60">Cancel</button>
                                    </div>
                                </x-modal>
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
