@extends('layout.sidebar')

@section('content')
    <h1 class="mb-5 ml-5">{{ $header ?? 'Header not found' }}</h1>

    <div class="grid grid-rows-1 grid-flow-col gap-10 mx-5">
        <div class="max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700 mb-5">
            <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">20</h5>
            <p class="font-normal text-gray-700 dark:text-gray-400">Total Siswa</p>
        </div>
    
        <div class="max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700 mb-5">
            <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">7</h5>
            <p class="font-normal text-gray-700 dark:text-gray-400">Total Guru</p>
        </div>
    
        <div class="max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700 mb-5">
            <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">8</h5>
            <p class="font-normal text-gray-700 dark:text-gray-400">Total Kelas</p>
        </div>
    </div>

    <div class="relative overflow-x-auto shadow-md sm:rounded-lg pr-2">
        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        No
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Nama
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Kelas
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Nilai
                    </th>
                </tr>
            </thead>
            <tbody>
                @for($i = 0; $i < 3; $i++)
                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        {{ $i + 1 }}
                    </th>
                    <td class="px-6 py-4">
                        Gany
                    </td>
                    <td class="px-6 py-4">
                        XI TKJ A
                    </td>
                    <td class="px-6 py-4">
                        90
                    </td>
                </tr>
                @endfor
            </tbody>
        </table>
    </div>
@endsection
