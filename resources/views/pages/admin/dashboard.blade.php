@extends('pages.admin.base')

@section('header', 'Dashboard')

@section('container')
    <div class="grid grid-cols-2 gap-4">
        <div class="col-span-1">
            <!-- Card untuk user -->
            <div class="max-w-4xl w-full p-4 bg-white shadow-lg rounded-lg transform hover:scale-105 transition-transform duration-300 m-4" role="region" aria-label="User card">
                <div class="mt-4 grid grid-cols-1 gap-2">

                    <div class="p-6 bg-blue-100 rounded-lg flex items-center justify-between hover:bg-blue-200 transition-colors duration-300 cursor-pointer shadow-md hover:shadow-lg" role="button" aria-label="Admins count">
                        <div class="text-blue-500">
                            <span class="material-symbols-outlined text-2xl">
                                shield_person
                            </span>
                        </div>
                        <div class="text-right">
                            <p class="text-sm font-medium text-gray-700">Admins</p>
                            <p id="majors-count" class="text-lg font-semibold text-gray-900">1</p>
                        </div>
                    </div>

                    <div class="p-6 bg-green-100 rounded-lg flex items-center justify-between hover:bg-green-200 transition-colors duration-300 cursor-pointer shadow-md hover:shadow-lg" role="button" aria-label="Classroom count">
                        <div class="text-green-500">
                            <span class="material-symbols-outlined text-2xl">
                                person
                            </span>
                        </div>
                        <div class="text-right">
                            <p class="text-sm font-medium text-gray-700">Teachers</p>
                            <p id="classroom-count" class="text-lg font-semibold text-gray-900">12</p>
                        </div>
                    </div>

                    <div class="p-6 bg-green-100 rounded-lg flex items-center justify-between hover:bg-green-200 transition-colors duration-300 cursor-pointer shadow-md hover:shadow-lg" role="button" aria-label="Classroom count">
                        <div class="text-green-500">
                            <span class="material-symbols-outlined text-2xl">
                                assignment_ind
                            </span>
                        </div>
                        <div class="text-right">
                            <p class="text-sm font-medium text-gray-700">Students</p>
                            <p id="classroom-count" class="text-lg font-semibold text-gray-900">120</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

            <!-- Card untuk class -->
        <div class="col-span-1">
            <div class="max-w-4xl w-full p-4 bg-white shadow-lg rounded-lg transform hover:scale-105 transition-transform duration-300 m-4" role="region" aria-label="Class card">
                <div class="mt-4 grid grid-cols-1 gap-2">

                    <div class="p-6 bg-green-100 rounded-lg flex items-center justify-between hover:bg-green-200 transition-colors duration-300 cursor-pointer shadow-md hover:shadow-lg" role="button" aria-label="Teachers count">
                        <div class="text-green-500">
                            <span class="material-symbols-outlined text-2xl">
                                school
                            </span>
                        </div>
                        <div class="text-right">
                            <p class="text-sm font-medium text-gray-700">Majors</p>
                            <p id="teachers-count" class="text-lg font-semibold text-gray-900">9</p>
                        </div>
                    </div>

                    <div class="p-6 bg-green-100 rounded-lg flex items-center justify-between hover:bg-green-200 transition-colors duration-300 cursor-pointer shadow-md hover:shadow-lg" role="button" aria-label="Majors count">
                        <div class="text-green-500">
                            <span class="material-symbols-outlined text-2xl">
                                meeting_room
                            </span>
                        </div>
                        <div class="text-right">
                            <p class="text-sm font-medium text-gray-700">Classroom</p>
                            <p id="admins-count" class="text-lg font-semibold text-gray-900">30</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
