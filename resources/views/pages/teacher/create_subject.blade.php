@extends('pages.teacher.base')

@section('header', 'Create Subject')

@section('container')
    <form method="post" action="{{ url('teacher/subject/create') }}" class="max-w-[400px] w-full">
        @csrf

        @include('components.message')

        <div class="mb-1 font-semibold">
            Subject Name
        </div>
        <div class="mb-4">
            <div class="mb-4">
                <x-text-input name="name" with-error/>
            </div>
        </div>

        <div class="mb-1 font-semibold">
            Starts At
        </div>
        <div class="mb-4">
            <x-date-time-picker name="starts_at"/>
        </div>

        <div class="mb-1 font-semibold">
            Ends At
        </div>
        <div class="mb-4">
            <x-date-time-picker name="ends_at"/>
        </div>

        <div class="mb-1 font-semibold">
            Shuffle Questions
        </div>
        <div class="mb-4">
            @component('components.input.checkbox', ['id' => 'question', 'name' => 'shuffle_questions', 'placeholder' => 'Shuffle Questions'])
            @endcomponent
        </div>

        <div class="mb-1 font-semibold">
            Shuffle Answers
        </div>
        <div class="mb-4">
            @component('components.input.checkbox', ['id' => 'answer', 'name' => 'shuffle_answers', 'placeholder' => 'Shuffle Answers'])
            @endcomponent
        </div>

        <x-button type="submit">Create</x-button>
    </form>
@endsection

@section('scripts')
    @parent

    @component('components.script', ['src' => 'js/create_student.js'])
    @endcomponent
@endsection
