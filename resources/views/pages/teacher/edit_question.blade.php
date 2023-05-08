@extends('pages.teacher.base')

@section('header', 'Edit Question')

@section('container')
    <div>
        <form method="post" action="{{ url('teacher/subject/editQuestion/' . $question->id) }}"
            class="max-w-[700px] w-full mr-20">
            @csrf

            @include('components.message')

            <div class="mb-1 font-semibold">
                Question
            </div>
            <div class="mb-4">
                <textarea name="question" class="h-[200px] resize-y shadow-md border border-gray-300 text-gray-600 rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2">{{ old('question', $question->question) }}</textarea>
                <x-form-error field="question"/>
            </div>

            <div class="mb-1 font-semibold">
                Score
            </div>
            <div class="mb-4">
                <x-text-input type="number" name="score" value="{{ old('score', $question->score) }}"/>
                <x-form-error field="score"/>
            </div>

            <div class="mb-1 font-semibold">
                Answer
            </div>
            <div class="mb-4">
                <select name="answer" class="shadow-md border border-gray-300 text-gray-600 rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2">
                    <option value="">Select Answer</option>
                    @foreach(['A', 'B', 'C', 'D', 'E'] as $ans)
                        <option value="{{ $ans }}"{{ old('answer', $question->answer) === $ans ? ' selected' : '' }}>{{ $ans }}</option>
                    @endforeach
                </select>
                <x-form-error field="answer"/>
            </div>

            <x-button type="submit">Edit</x-button>
        </form>
    </div>
@endsection
