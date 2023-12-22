<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-8">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-md sm:rounded-lg p-4">
                <div class="grid grid-cols-1 md:grid-cols-3">
                    <div class="flex flex-col p-4">
                        <h5 class="text-2xl font-bold">40</h5>
                        <p class="text-lg font-normal text-gray-400">Total Alumni</p>
                    </div>
                    <div class="flex flex-col p-4">
                        <h5 class="text-2xl font-bold">{{ $totalDosen }}</h5>
                        <p class="text-lg font-normal text-gray-400">Total Dosen</p>
                    </div>
                    <div class="flex flex-col p-4">
                        <h5 class="text-2xl font-bold">{{ $totalAgenda }}</h5>
                        <p class="text-lg font-normal text-gray-400">Total Agenda</p>
                    </div>
                    <div class="flex flex-col p-4">
                        <h5 class="text-2xl font-bold">{{ $totalBerita }}</h5>
                        <p class="text-lg font-normal text-gray-400">Total Berita</p>
                    </div>
                    <div class="flex flex-col p-4">
                        <h5 class="text-2xl font-bold">{{ $totalFakultas }}</h5>
                        <p class="text-lg font-normal text-gray-400">Total Fakultas & Prodi</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
