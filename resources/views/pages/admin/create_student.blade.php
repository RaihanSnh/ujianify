@extends('pages.admin.base')

@section('header', 'Create Student')

@section('container')
    <form method="post" action="{{ url('/admin/student/create') }}" class="max-w-[400px] w-full">
        @csrf

        @include('components.message')

        <div class="mb-1 font-semibold">
            Username
        </div>
        <div class="mb-4">
            @component('components.input.text', ['name' => 'username', 'placeholder' => 'Username'])
            @endcomponent
        </div>

        <div class="mb-1 font-semibold">
            Password
        </div>
        <div class="mb-4">
            @component('components.input.password', ['name' => 'password', 'placeholder' => 'Password'])
            @endcomponent
        </div>

        <div class="mb-1 font-semibold">
             External ID (NISN)
        </div>
        <div class="mb-4">
            @component('components.input.text', ['name' => 'external_id', 'placeholder' => 'External ID'])
            @endcomponent
        </div>

        <div class="mb-1 font-semibold">
            Student Full Name
        </div>
        <div class="mb-4">
            @component('components.input.text', ['name' => 'full_name', 'placeholder' => 'Student Full Name'])
            @endcomponent
        </div>

        <div class="mb-1 font-semibold">
            Major
        </div>
        <div class="mb-4">
            <select id="selectMajor" name="major_id" class="shadow-md border border-gray-300 text-gray-600 rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2">
                <option value="">Select Major</option>
                @foreach(\App\Models\Major::all() as $major)
                    <option value="{{ $major->id }}">{{ $major->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-1 font-semibold">
            Classroom
        </div>
        <div class="mb-4">
            <select id="selectClassroom" name="classroom_id" class="shadow-md border border-gray-300 text-gray-900 rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2">
                <option value="">Select Class</option>
                @foreach(\App\Models\Classroom::all() as $class)
                    <option value="{{ $class->id }}">{{ $class->name }}</option>
                @endforeach
            </select>
        </div>

        @component('components.button', ['type' => 'submit'])
            Create
        @endcomponent
    </form>
@endsection

@section('scripts')
    @parent

    @component('components.script', ['src' => 'js/create_student.js'])
    @endcomponent
@endsection
