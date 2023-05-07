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
                    <button type="submit"
                        class="inline-flex items-center px-4 py-2 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest bg-red-600 hover:bg-red-700 active:bg-red-900 focus:outline-none focus:border-red-900 focus:shadow-outline-gray disabled:opacity-25 transition ease-in-out duration-150">
                        Logout
                    </button>
                </form>
            </div>
        </nav>

        <div class="container mx-auto px-4 py-8">
            <h1 class="text-3xl font-bold text-gray-800 mb-4">Welcome to Ujianify</h1>
            <p class="text-lg text-gray-600 mb-8">A website created for online school exams</p>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                <div class="bg-white rounded-lg shadow-lg p-8">
                    <h2 class="text-xl font-bold text-gray-800 mb-4">Exam Schedule</h2>
                    <p class="text-gray-600 mb-5">View the exam schedule and plan accordingly.</p>
                    <a href="#"
                        class="mt-4 bg-indigo-500 text-white font-bold py-2 px-4 rounded hover:bg-indigo-700">View Schedule</a>
                </div>
            </div>
        </div>
    @endsection
