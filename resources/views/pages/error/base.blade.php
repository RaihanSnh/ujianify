@extends('layout.app')

@section('body')
    <div class="flex flex-col justify-center items-center h-[100vh] w-full">
        <div class="flex flex-row justify-center items-center w-full">
            <div class="flex flex-col text-2xl font-bold rounded-lg border-gray-200 border py-4 px-6 shadow-md mx-2">
                @yield('error')
            </div>
        </div>
    </div>
@endsection
