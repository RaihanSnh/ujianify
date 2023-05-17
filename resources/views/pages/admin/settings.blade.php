@extends('pages.admin.base')

@section('header', 'Settings')

@section('container')
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Informasi Profil') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 h-[420px] bg-white border-b border-gray-200">
                    <div class="grid grid-cols-2 mt-5">
                            <div class="flex flex-col items-center pb-10">
                                <img class="w-24 h-24 mb-3 rounded-full shadow-lg"/>
                                <h5 class="mb-1 text-xl font-medium text-gray-900 dark:text-white">Admin</h5>
                                <span class="text-sm text-gray-500 dark:text-gray-400">arya</span>
                                <div class="flex mt-4 space-x-3 md:mt-6">
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
