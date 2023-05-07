@extends('pages.student.base')

@section('container')
    <div class="container mx-auto px-4 py-8">
        <h1 class="text-3xl font-bold text-gray-800 mb-4">Welcome to Ujianify</h1>
        <p class="text-lg text-gray-600 mb-8">A website created for online school exams</p>
        <div class="flex flex-wrap gap-6 justify-center">
            @foreach (\App\Models\Subject::query()->get() as $subject)
                <div class="bg-white rounded-lg shadow border px-6 py-4 w-full max-w-[500px] mb-6">
                    <h2 class="text-xl font-bold text-gray-800 mb-4">{{ $subject->name }}</h2>
                    <p class="text-gray-600"><b>Starts At:</b> {{ $subject->starts_at->format('j F Y, H.i') }}</p>
                    <p class="text-gray-600 mb-5"><b>Ends At:</b> {{ $subject->ends_at->format('j F Y, H.i') }}</p>
                    <form action="{{ url('subject/' . $subject->id) }}">
                        <x-button type="submit">Start</x-button>
                    </form>
                </div>
            @endforeach
        </div>
    </div>
@endsection
