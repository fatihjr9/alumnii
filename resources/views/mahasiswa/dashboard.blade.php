<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Beranda') }}
        </h2>
    </x-slot>

    <div class="py-8">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="flex flex-col md:flex-row p-4 md:p-0 justify-between items-start gap-4">
                <div class="bg-white p-4 rounded-md w-full">
                    <h5 class="text-2xl font-bold mb-4">Agenda Hari ini</h5>
                    @foreach ($berita as $item)
                        <div class="flex flex-row items-center justify-between p-4 border border-gray-400 rounded-md">
                            <div class="flex flex-col gap-y-2">
                                <h5 class="text-xl font-bold">{{ $item->nama }}</h5>
                                <p class="text-sm text-gray-500">{{ $item->tanggal }}</p>
                            </div>
                            <p>{{ $item->deskripsi }}</p>
                        </div>
                    @endforeach
                </div>
                <div class="grid grid-cols-1 gap-y-4 w-full lg:w-96">
                    <div class="bg-white p-4 rounded-md">
                        <h5 class="text-xl font-bold mb-4">Agenda Terbaru</h5>
                        @foreach ($agenda as $item)
                            <div class="flex flex-col justify-between border-b border-slate-200 pb-2 gap-y-1">
                                <div class="flex flex-col">
                                    <h5 class="text-base font-semibold">{{ $item->nama }}</h5>
                                    <p class="text-sm text-gray-500">{{ $item->tanggal }}</p>
                                </div>
                                <p class="text-sm text-gray-500">{{ $item->deskripsi }}</p>
                            </div>
                        @endforeach
                    </div>
                    <div class="bg-white p-4 rounded-md w-full">
                        <h5 class="text-xl font-bold mb-4">Berita Terbaru</h5>
                        @foreach ($berita as $item)
                            <div class="flex flex-col justify-between border-b border-slate-200 pb-2 gap-y-1">
                                <div class="flex flex-col">
                                    <h5 class="text-base font-semibold">{{ $item->nama }}</h5>
                                    <p class="text-sm text-gray-500">{{ $item->tanggal }}</p>
                                </div>
                                <p class="text-sm text-gray-500">{{ $item->deskripsi }}</p>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>