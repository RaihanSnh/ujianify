@extends('pages.admin.base')

@section('header', 'Edit Major')

@section('container')
    <form method="post" action="{{ url('/admin/major/update/' . $major->id) }}" class="max-w-[400px] w-full">
        @csrf

        @include('components.message')

        <div class="mb-1 font-semibold">
            Major Name
        </div>
        <div class="mb-4">
            @component('components.input.text', ['name' => 'name', 'placeholder' => 'Major Name', 'value' => $major->name])
            @endcomponent
        </div>

        @component('components.button', ['type' => 'submit'])
            Update
        @endcomponent
    </form>
@endsection
