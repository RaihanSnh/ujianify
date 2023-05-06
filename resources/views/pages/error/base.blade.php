@extends('layout.app')

@section('body')
    <div class="flex flex-col justify-center items-center h-[100vh] w-full">
        <div class="flex flex-row justify-center items-center w-full">
            <div class="flex flex-col w-full">
                @yield('error')
            </div>
        </div>
    </div>
@endsection
