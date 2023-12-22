<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Agenda Terbaru') }}
        </h2>
    </x-slot>

    <div class="py-8">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3">
                @foreach ($agenda as $item)
                    <div class="flex flex-col justify-between bg-white rounded-md gap-y-2 shadow-sm border border-slate-200">
                        <img src="{{ asset('berita/' . $item->gambar) }}" alt="{{ $item->nama }}" class="rounded-t-md">
                        <div class="flex flex-col px-4 py-2">
                            <h5 class="text-base font-semibold">{{ $item->nama }}</h5>
                            <p class="text-sm text-gray-500">{{ $item->tanggal }}</p>
                            <p class="text-sm text-gray-500">{{ $item->deskripsi }}</p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</x-app-layout>