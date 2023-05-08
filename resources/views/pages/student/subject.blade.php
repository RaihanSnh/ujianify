@extends('layout.app')

@section('body')
    <div class="flex h-[100vh] flex-col">
        <div class="flex h-24 w-full items-center border-b border-b-gray-200 px-8 shadow">
            <div class="flex items-center flex-auto text-2xl font-bold w-full">
                {{-- NAVBAR LOGO HERE --}}
            </div>
            <div class="flex flex-col items-center w-64">
                <div>Nomor Soal</div>
                <div class="font-bold text-3xl">{{ $noQuestion }}</div>
            </div>
            <div class="flex flex-col items-end text-lg flex-auto w-full">
                <div>Sisa waktu</div>
                <div id="countdown_subject" class="text-2xl font-bold"></div>
                <script>
                    document.addEventListener('DOMContentLoaded', function () {
                        startCountdown(new Date({{ $subject->ends_at->unix() * 1000 }}), 'countdown_subject');
                    });
                </script>
            </div>
        </div>
        <div class="flex w-full flex-auto">
            <div class="flex w-[350px] flex-col gap-4 bg-blue-500 px-3 py-6 text-white">
                <div class="flex w-full justify-center">
                    <img alt="pp" class="w-[200px] border-4" src="https://avatars.githubusercontent.com/u/35138228?v=4"/>
                </div>
                <div class="flex w-full flex-col items-center gap-1">
                    <div class="text-2xl">100-821-911-634</div>
                    <div class="text-center font-thin">NOCLIP</div>
                </div>
                <div class="flex w-full flex-col items-center gap-2 rounded-sm bg-white pb-4 pt-2 text-black">
                    <div class="font-semibold">Daftar Soal</div>
                    <div class="flex flex-wrap justify-center gap-1 px-4 text-gray-600">
                        <div class="mb-1 mx-0.5 w-10 rounded-sm border border-gray-500 p-2 text-center hover:cursor-pointer hover:bg-blue-200">1</div>
                    </div>
                </div>
            </div>

            <div class="h-full w-full">
                <div class="flex h-full w-full flex-col">
                    <div class="flex-auto">
                        <div class="p-8 text-2xl select-none max-w-[1200px]">
                            {{ $question->question }}
                        </div>
                    </div>
                    <div class="min-h-28 border-t border-t-gray-300 py-2">
                        <div class="mb-2 flex w-96 gap-3 px-2 text-lg font-semibold text-blue-400">
                            @foreach(['A', 'B', 'C', 'D', 'E'] as $ans)
                                <div class="flex-auto rounded-md border border-blue-400 px-4 py-2 text-center hover:cursor-pointer hover:bg-blue-200">{{ $ans }}</div>
                            @endforeach
                        </div>
                        <div class="flex w-96 gap-3 px-2 text-lg text-blue-400">
                            <div class="flex gap-2 justify-center items-center flex-auto rounded-md border border-blue-400 bg-blue-400 px-4 py-1.5 text-center text-white hover:cursor-pointer hover:bg-blue-500">
                                <i class="material-symbols-outlined">arrow_back</i> Sebelumnya
                            </div>
                            <div class="flex gap-2 justify-center items-center flex-auto rounded-md border border-blue-400 bg-blue-400 px-4 py-1.5 text-center text-white hover:cursor-pointer hover:bg-blue-500">
                                Selanjutnya <i class="material-symbols-outlined">arrow_forward</i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
