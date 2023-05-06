@extends('layout.app')

@section('body')
    {{-- SIDEBAR --}}
    <div class="fixed top-0 hidden h-[100vh] w-[250px] bg-blue-400 lg:block py-8 px-4 text-gray-100">
        <div class="flex flex-col h-full w-full gap-2">
            <div class="font-bold w-full text-center text-3xl mb-5">
                Ujianify
            </div>
                <div
                    class="flex gap-x-2 items-center rounded-lg px-4 py-2 hover:bg-blue-300 hover:cursor-pointer font-semibold mb-3">
                    <span class="material-symbols-outlined">
                        grid_view
                    </span>
                    <button type="submit">Dashboard</button>
                </div>
                <div
                    class="flex gap-x-2 items-center rounded-lg px-4 py-2 hover:bg-blue-300 hover:cursor-pointer font-semibold mb-3">
                    <span class="material-symbols-outlined">
                        account_circle
                    </span>
                    User
                </div>
                <div
                    class="flex gap-x-2 items-center rounded-lg px-4 py-2 hover:bg-blue-300 hover:cursor-pointer font-semibold mb-3">
                    <span class="material-symbols-outlined">
                        school
                    </span>
                    Major
                </div>
                <div
                    class="flex gap-x-2 items-center rounded-lg px-4 py-2 hover:bg-blue-300 hover:cursor-pointer font-semibold mb-3">
                    <span class="material-symbols-outlined">
                        meeting_room
                    </span>
                    Classroom
                </div>
                <div
                    class="flex gap-x-2 items-center rounded-lg px-4 py-2 hover:bg-blue-300 hover:cursor-pointer font-semibold mb-3">
                    <span class="material-symbols-outlined">
                        settings
                    </span>
                    Settings
                </div>
                <div
                    class="flex gap-x-2 items-center rounded-lg px-4 py-2 hover:bg-blue-300 hover:cursor-pointer font-semibold mb-3">
                    <span class="material-symbols-outlined">
                        logout
                    </span>
                    Logout
                </div>
        </div>
    </div>

    {{-- CONTAINER --}}
    <div class="w-full lg:pl-[280px] py-8">
        <div class="font-semibold text-3xl">
            {{ $header ?? 'Header not found' }}
            @yield('content')
        </div>
    </div>
@endsection
