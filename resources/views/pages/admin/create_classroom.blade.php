@extends('pages.admin.base')

@section('header', 'Create Classroom')

@section('container')
    <form method="post" action="{{ url('/admin/classroom/create') }}" class="max-w-[400px] w-full">
        @csrf

        @include('components.message')

        <div class="mb-1 font-semibold">
            Classroom Name
        </div>
        <div class="mb-4">
            @component('components.input.text', ['name' => 'name', 'placeholder' => 'Classroom Name'])
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

        @component('components.button', ['type' => 'submit'])
            Create
        @endcomponent
    </form>
@endsection
