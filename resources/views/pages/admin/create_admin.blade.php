@extends('pages.admin.base')

@section('header', 'Create Admin')

@section('container')
    <form method="post" action="{{ url('/admin/admin/create') }}" class="max-w-[400px] w-full">
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

        @component('components.button', ['type' => 'submit'])
            Create
        @endcomponent
    </form>
@endsection
