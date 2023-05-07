@extends('pages.admin.base')

@section('header', 'Major')

@section('container')
    <div class="max-w-[200px] mb-4">
        <form action="{{ url('admin/major/create') }}">
            <x-button type="submit">Create Major</x-button>
        </form>
    </div>
    <div class="rounded-lg border shadow-lg py-3 px-5 w-[900px]">
        <div style="max-width: 900px; overflow-x: auto;">
            <table id="majorTable" class="row-border max-w-[900px]">
                <thead>
                <tr>
                    <th>Major Name</th>
                    <th>Classroom</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach(\App\Models\Major::query()->get() as $major)
                    <tr>
                        <td>{{ $major->name }}</td>
                        <td>{{ count($major->classrooms()->get()) }}</td>
                        <td>
                            <div class="flex flex-row items-center gap-x-2 text-xs">
                                <form action="{{ url('admin/major/' . $major->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button class="flex items-center gap-x-1 px-2 py-0.5 rounded-lg bg-red-900 hover:bg-red-800 text-gray-50">
                                        <span class="material-symbols-outlined">
                                        delete
                                        </span>
                                    </button>
                                </form>

                                <form action="{{ url('admin/major/edit/' . $major->id) }}">
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
            new DataTable('#majorTable');
        });
    </script>
@endsection
