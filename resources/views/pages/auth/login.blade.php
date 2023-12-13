@extends('layout.app')

@section('body')
    <div class="flex flex-col justify-center items-center min-h-[100vh] w-full">
        <div class="mb-8">
            <img src="{{ url("images/welcome.gif") }}" alt="anim welcome" width="300"/>
        </div>
        <div class="flex flex-row justify-center items-center max-w-[350px] w-full">
            <form method="post" action="{{ url('auth/login') }}" class="w-full p-8">
                <div class="mb-4 text-4xl font-bold text-center">
                    Login
                </div>
                @if(Session::has('login_error'))
                    <div class="mb-4">
                        <div class="rounded-lg bg-red-100 text-red-800 px-4 py-3">
                            {{ Session::get('login_error') }}
                        </div>
                    </div>
                @endif
                @csrf
                <div class="mb-4">
                    <x-text-input name="username" with-error/>
                </div>
                <div class="mb-4">
                    <x-text-input name="password" with-error/>
                </div>
                <div class="mb-4">
                    <x-button type="submit" left-icon="arrow_forward">
                        Login
                    </x-button>
                </div>
            </form>
        </div>
    </div>
@endsection
