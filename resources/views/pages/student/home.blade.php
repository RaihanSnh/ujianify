@extends('pages.student.base')

@section('container')
    <div class="container mx-auto px-4 py-8">
        <h1 class="text-3xl font-bold text-gray-800 mb-4">Welcome to Ujianify</h1>
        <p class="text-lg text-gray-600 mb-8">A website created for online school exams</p>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @foreach (\App\Models\Subject::query()->get() as $subject)
                <div class="bg-white rounded-2xl shadow-lg p-8">
                    <h2 class="text-xl font-bold text-gray-800 mb-4">{{ $subject->name }}</h2>
                    <p class="text-gray-600">Starts At : {{ $subject->starts_at }}</p>
                    <p class="text-gray-600 mb-5">Ends At : {{ $subject->ends_at }}</p>
                    <a href="#" class="mt-4 bg-indigo-500 text-white font-bold py-2 px-4 rounded-xl hover:bg-indigo-700">Start</a>
                </div>
        </div>
    </div>
    @endforeach
@endsection
