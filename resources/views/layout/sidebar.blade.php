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
                    <form method="get" action="{{ route('admin.dashboard') }}">
                        <button type="submit">Dashboard</button>
                    </form>
                </div>
                <div
                    class="flex gap-x-2 items-center rounded-lg px-4 py-2 hover:bg-blue-300 hover:cursor-pointer font-semibold mb-3">
                    <span class="material-symbols-outlined">
                        account_circle
                    </span>
                    <form action="/admin/user/">
                        <button type="submit">User</button>
                    </form>
                </div>
                <div
                    class="flex gap-x-2 items-center rounded-lg px-4 py-2 hover:bg-blue-300 hover:cursor-pointer font-semibold mb-3">
                    <span class="material-symbols-outlined">
                        school
                    </span>
                    <form action="/admin/major/">
                        <button type="submit">Major</button>
                    </form>
                </div>
                <div
                    class="flex gap-x-2 items-center rounded-lg px-4 py-2 hover:bg-blue-300 hover:cursor-pointer font-semibold mb-3">
                    <span class="material-symbols-outlined">
                        meeting_room
                    </span>
                    <form action="/admin/classroom/">
                        <button type="submit">Classroom</button>
                    </form>
                </div>
                <div
                    class="flex gap-x-2 items-center rounded-lg px-4 py-2 hover:bg-blue-300 hover:cursor-pointer font-semibold mb-3">
                    <span class="material-symbols-outlined">
                        settings
                    </span>
                    <form action="/admin/setting/">
                        <button type="submit">Settings</button>
                    </form>
                </div>
                <div
                    class="flex gap-x-2 items-center rounded-lg px-4 py-2 hover:bg-blue-300 hover:cursor-pointer font-semibold mb-3">
                    <span class="material-symbols-outlined">
                        logout
                    </span>
                    <form action="/admin/logout/">
                        <button type="submit">Logout</button>
                    </form>
                </div>
        </div>
    </div>

    {{-- CONTAINER --}}
    <div class="w-full lg:pl-[280px] py-8">
        <div class="font-semibold text-3xl">
            @yield('content')
        </div>
    </div>
@endsection
