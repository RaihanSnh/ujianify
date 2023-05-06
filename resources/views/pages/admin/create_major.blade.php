@extends('pages.admin.base')

@section('container')
    <form method="post" action="{{ url('/admin/major/create') }}" class="max-w-[400px] w-full">
        @csrf

        @include('components.message')

        <div class="mb-1 font-semibold">
            Major Name
        </div>
        <div class="mb-4">
            @component('components.input.text', ['name' => 'name', 'placeholder' => 'Major Name'])
            @endcomponent
        </div>

        @component('components.button', ['type' => 'submit'])
            Create
        @endcomponent
    </form>
@endsection
