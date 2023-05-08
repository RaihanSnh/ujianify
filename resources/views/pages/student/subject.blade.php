@extends('layout.app')

@section('body')
    <div class="flex h-[100vh] flex-col">
        <div class="flex h-24 w-full items-center border-b border-b-gray-200 px-8 shadow">
            <div class="flex items-center flex-auto text-2xl font-bold w-full">
                <!--            <images alt="banner" class="h-20" src="https://sentraki.dgip.go.id/dokumen/SK-2093432464.png"/>-->
            </div>
            <div class="flex flex-col items-center w-64">
                <div>Nomor Soal</div>
                <div class="font-bold text-3xl">10</div>
            </div>
            <div class="flex flex-col items-end text-lg flex-auto w-full">
                <div>Sisa waktu</div>
                <div id="countdownZ" class="text-2xl font-bold"></div>
                <script>
                    document.addEventListener('DOMContentLoaded', function () {
                        startCountdown(new Date(Date.now() + (3600 * 1000)), 'countdownZ');
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
                        <div class="mb-1 mx-0.5 w-10 rounded-sm border border-gray-500 p-2 text-center hover:cursor-pointer hover:bg-blue-200">2</div>
                        <div class="mb-1 mx-0.5 w-10 rounded-sm border border-gray-500 p-2 text-center hover:cursor-pointer hover:bg-blue-200">3</div>
                        <div class="mb-1 mx-0.5 w-10 rounded-sm border border-gray-500 p-2 text-center hover:cursor-pointer hover:bg-blue-200">4</div>
                        <div class="mb-1 mx-0.5 w-10 rounded-sm border border-gray-500 p-2 text-center hover:cursor-pointer hover:bg-blue-200">5</div>
                        <div class="mb-1 mx-0.5 w-10 rounded-sm border border-gray-500 p-2 text-center hover:cursor-pointer hover:bg-blue-200">6</div>
                        <div class="mb-1 mx-0.5 w-10 rounded-sm border border-gray-500 p-2 text-center hover:cursor-pointer hover:bg-blue-200">7</div>
                        <div class="mb-1 mx-0.5 w-10 rounded-sm border border-gray-500 p-2 text-center hover:cursor-pointer hover:bg-blue-200">8</div>
                        <div class="mb-1 mx-0.5 w-10 rounded-sm border border-gray-500 p-2 text-center hover:cursor-pointer hover:bg-blue-200">9</div>
                        <div class="mb-1 mx-0.5 w-10 rounded-sm border border-gray-500 p-2 text-center hover:cursor-pointer hover:bg-blue-200">10</div>
                        <div class="mb-1 mx-0.5 w-10 rounded-sm border border-gray-500 p-2 text-center hover:cursor-pointer hover:bg-blue-200">11</div>
                        <div class="mb-1 mx-0.5 w-10 rounded-sm border border-gray-500 p-2 text-center hover:cursor-pointer hover:bg-blue-200">12</div>
                        <div class="mb-1 mx-0.5 w-10 rounded-sm border border-gray-500 p-2 text-center hover:cursor-pointer hover:bg-blue-200">13</div>
                        <div class="mb-1 mx-0.5 w-10 rounded-sm border border-gray-500 p-2 text-center hover:cursor-pointer hover:bg-blue-200">14</div>
                        <div class="mb-1 mx-0.5 w-10 rounded-sm border border-gray-500 p-2 text-center hover:cursor-pointer hover:bg-blue-200">15</div>
                        <div class="mb-1 mx-0.5 w-10 rounded-sm border border-gray-500 p-2 text-center hover:cursor-pointer hover:bg-blue-200">16</div>
                        <div class="mb-1 mx-0.5 w-10 rounded-sm border border-gray-500 p-2 text-center hover:cursor-pointer hover:bg-blue-200">17</div>
                        <div class="mb-1 mx-0.5 w-10 rounded-sm border border-gray-500 p-2 text-center hover:cursor-pointer hover:bg-blue-200">18</div>
                        <div class="mb-1 mx-0.5 w-10 rounded-sm border border-gray-500 p-2 text-center hover:cursor-pointer hover:bg-blue-200">19</div>
                        <div class="mb-1 mx-0.5 w-10 rounded-sm border border-gray-500 p-2 text-center hover:cursor-pointer hover:bg-blue-200">20</div>
                    </div>
                </div>
            </div>

            <div class="h-full w-full">
                <div class="flex h-full w-full flex-col">
                    <div class="flex-auto">
                        <div class="p-8 text-2xl select-none max-w-[1200px]">
                            Berapakah 1+1 itu?<br/><br/>
                            A. 1<br/>
                            B. 2<br/>
                            C. 3<br/>
                            D. 4<br/>
                            E. 5<br/>
                        </div>
                    </div>
                    <div class="min-h-28 border-t border-t-gray-300 py-2">
                        <div class="mb-2 flex w-96 gap-3 px-2 text-lg font-semibold text-blue-400">
                            <div class="flex-auto rounded-md border border-blue-400 px-4 py-2 text-center hover:cursor-pointer hover:bg-blue-200">A</div>
                            <div class="flex-auto rounded-md border border-blue-400 px-4 py-2 text-center hover:cursor-pointer hover:bg-blue-200">B</div>
                            <div class="flex-auto rounded-md border border-blue-400 px-4 py-2 text-center hover:cursor-pointer hover:bg-blue-200">C</div>
                            <div class="flex-auto rounded-md border border-blue-400 px-4 py-2 text-center hover:cursor-pointer hover:bg-blue-200">D</div>
                            <div class="flex-auto rounded-md border border-blue-400 px-4 py-2 text-center hover:cursor-pointer hover:bg-blue-200">E</div>
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
