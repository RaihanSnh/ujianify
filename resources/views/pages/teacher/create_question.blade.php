@extends('pages.teacher.base')

@section('header', 'Question And Answer')

@section('container')
    <div class="flex">
        <form method="post" action="{{ url('teacher/subject/question/create/' . $subject->id) }}"
            class="max-w-[400px] w-full mr-20">
            @csrf

            @include('components.message')

            <div class="mb-1 font-semibold">
                Subject Name
            </div>
            <div class="mb-4">
                <x-text-input name="name" placeholder="Subject Name" value="{{ $subject->name }}" with-error />
            </div>
            <div class="mb-1 font-semibold">
                Question
            </div>
            <div class="mb-4">
                <textarea name="question" cols="30" rows="10"
                    class="shadow appearance-none border rounded-lg w-full py-2 px-3 text-gray-700 leading-tight focus:border-blue-300 focus:outline-none focus:shadow-outline resize-none"></textarea>
            </div>
            <div class="mb-1 font-semibold">
                Image
            </div>
            <div class="mb-4">
                <input
                    class="shadow appearance-none border rounded-lg w-full py-1 px-2 text-gray-700 leading-tight focus:border-blue-300 focus:outline-none focus:shadow-outline"
                    type="file">
            </div>
        </form>

        <form method="post" action="{{ url('teacher/subject/question/create/' . $subject->id) }}"
            class="max-w-[400px] w-full">
            @csrf

            @include('components.message')

            <div class="mb-1 font-semibold">
                Answer
            </div>
            <div class="mb-4">
                <textarea name="answer" cols="30" rows="10"
                    class="shadow appearance-none border rounded-lg w-full py-2 px-3 text-gray-700 leading-tight focus:border-blue-300 focus:outline-none focus:shadow-outline resize-none"></textarea>
            </div>

            <div class="mb-1 font-semibold">
                Score
            </div>
            <div class="mb-4">
                <x-text-input name="score" placeholder="Score" with-error />
            </div>

            <div class="mb-1 font-semibold">
                Image
            </div>
            <div class="mb-4">
                <input
                    class="shadow appearance-none border rounded-lg w-full py-1 px-2 text-gray-700 leading-tight focus:border-blue-300 focus:outline-none focus:shadow-outline"
                    type="file">
            </div>

            <x-button type="submit">Create</x-button>

        </form>
    </div>
@endsection
