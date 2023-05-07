@extends('pages.admin.base')

@section('header', 'Edit Classroom')

@section('container')
    <form method="post" action="{{ url('/admin/classroom/update/' . $classroom->id) }}" class="max-w-[400px] w-full">
        @csrf

        @include('components.message')

        <div class="mb-1 font-semibold">
            Classroom Name
        </div>
        <div class="mb-4">
            @component('components.input.text', ['name' => 'name', 'placeholder' => 'Classroom Name', 'value' => $classroom->name])
            @endcomponent
        </div>

        @component('components.button', ['type' => 'submit'])
            Update
        @endcomponent
    </form>
@endsection
