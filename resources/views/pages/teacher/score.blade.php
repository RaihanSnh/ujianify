@extends('pages.teacher.base')

@section('header', 'Score')

@section('container')
    <div class="rounded-lg border shadow-lg py-3 px-5 w-[900px]">
        <div style="max-width: 900px; overflow-x: auto;">
            <table id="scoreTable" class="row-border max-w-[900px]">
                <thead>
                <tr>
                    <th>Subjet Name</th>
                    <th>Student Name</th>
                    <th>Score</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach(\App\Models\Score::query()->get() as $score)
                    <tr>
                        <td>{{ $score->score }}</td>
                        <td>
                            <div class="flex flex-row items-center gap-x-2 text-xs">
                                <form action="{{ url('admin/teacher/edit/' . $score->subject_id) }}">
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
            new DataTable('#scoreTable');
        });
    </script>
@endsection
