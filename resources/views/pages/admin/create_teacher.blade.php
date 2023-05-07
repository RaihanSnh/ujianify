@extends('pages.admin.base')

@section('header', 'Create Teacher')

@section('container')
    <form method="post" action="{{ url('/admin/teacher/create') }}" class="max-w-[400px] w-full">
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
             External ID (NIP)
        </div>
        <div class="mb-4">
            @component('components.input.text', ['name' => 'external_id', 'placeholder' => 'External ID'])
            @endcomponent
        </div>

        <div class="mb-1 font-semibold">
            Teacher Full Name
        </div>
        <div class="mb-4">
            @component('components.input.text', ['name' => 'full_name', 'placeholder' => 'Teacher Full Name'])
            @endcomponent
        </div>

        @component('components.button', ['type' => 'submit'])
            Create
        @endcomponent
    </form>
@endsection
