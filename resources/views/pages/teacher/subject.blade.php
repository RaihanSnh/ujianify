@extends('pages.teacher.base')

@section('header', 'Subject')

@section('container')
    <div class="max-w-[200px] mb-4">
        <form action="{{ url('teacher/subject/create') }}">
        <x-button type="submit">Create Subject</x-button>
        </form>
    </div>
    <div class="rounded-lg border shadow-lg py-3 px-5 w-full max-w-[1400px]">
        <div style="width: 100%; max-width: 1400px; overflow-x: auto;">
            <table id="subjectTable" class="row-border w-full max-w-[1400px]">
                <thead>
                <tr>
                    <th>Subject Name</th>
                    <th>Starts At</th>
                    <th>Ends At</th>
                    <th>Shuffle Question</th>
                    <th>Shuffle Answer</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach(\App\Models\Subject::query()->get() as $subject)
                    <tr>
                        <td>{{ $subject->name }}</td>
                        <td>{{ $subject->starts_at->format('j F Y, H.i') }}</td>
                        <td>{{ $subject->ends_at->format('j F Y, H.i') }}</td>
                        <td>{{ $subject->shuffle_questions ? 'Yes' : 'No' }}</td>
                        <td>{{ $subject->shuffle_answers ? 'Yes' : 'No' }}</td>
                        <td>
                            <div class="flex flex-row items-center gap-x-2 text-xs">
                                <form action="{{ url('admin/teacher/edit/' . $subject->id) }}">
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
            new DataTable('#subjectTable');
        });
    </script>
@endsection
