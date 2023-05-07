@extends('layout.app')

@section('body')
    <div class="max-w-full mx-auto px-4 sm:px-6 lg:px-8 border-b-4">
        <nav class="flex items-center justify-between py-6">
            <a href="#" class="text-2xl font-bold text-gray-800">Ujianify</a>
            <div class="flex items-center">
                <a href="#" class="mr-6 text-gray-700 hover:text-gray-900">Home</a>
                <a href="#" class="mr-6 text-gray-700 hover:text-gray-900">Profile</a>
                <form action="{{ url('auth/logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="inline-flex items-center px-4 py-2 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest bg-red-600 hover:bg-red-700 active:bg-red-900 focus:outline-none focus:border-red-900 focus:shadow-outline-gray disabled:opacity-25 transition ease-in-out duration-150">
                        Logout
                    </button>
                </form>
            </div>
        </nav>
@endsection
