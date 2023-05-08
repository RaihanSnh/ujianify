@extends('pages.student.base')

@section('container')
    <div class="container mx-auto px-4 py-8">
        <h1 class="text-3xl font-bold text-gray-800 mb-4">Subject : {{ $subject->name }}</h1>
        <p class="text-lg text-gray-600 mb-8">Time :
            {{ number_format($subject->starts_at->diffInMinutes($subject->ends_at), 0, ',', '.') }} Minutes</p>
        <div class="bg-white rounded-lg overflow-hidden shadow-md">
            <div class="px-4 py-4">
                <h2 class="text-lg font-bold mb-4">Online Exam Rules</h2>
                <ul class="list-disc list-inside">
                    <li class="mb-2">Use a computer or laptop that is connected to the internet.</li>
                    <li class="mb-2">It is not allowed to open applications or websites other than those related to the exam.</li>
                    <li class="mb-2">It is not allowed to open documents or files on a computer or laptop.</li>
                    <li class="mb-2">Not allowed to communicate with other people during the exam.</li>
                    <li class="mb-2">Do not leave your seat during the exam unless there is an emergency.</li>
                    <li class="mb-2">Make sure the internet connection and devices are working properly before the exam starts.</li>
                    <li class="mb-2">The exam supervisor will monitor your activity during the exam.</li>
                    <li class="mb-2">When finished, don't forget to press the Submit button.</li>
                  </ul>
            </div>
            <div class="px-4 py-2 bg-gray-100">
                <form action="{{ url('/subject/' . $subject->id) }}">
                    <button class="inline-block px-4 py-2 rounded-md text-white bg-indigo-500 hover:bg-indigo-600">Start Exam</button>
                </form>
            </div>
        </div>     
    </div>
@endsection
