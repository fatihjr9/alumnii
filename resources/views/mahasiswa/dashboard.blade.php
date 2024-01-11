<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Beranda') }}
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto px-4 md:px-6 lg:px-8">
            <div class="bg-white p-4 rounded-md mb-4">
                 @foreach($galeri as $item)
                    <div id="default-carousel" class="relative w-full" data-carousel="slide">
                        <!-- Carousel wrapper -->
                        <div class="relative h-56 overflow-hidden rounded-lg md:h-96">
                            @foreach(json_decode($item->galeri) as $index => $image)
                                <div class="hidden duration-700 ease-in-out" data-carousel-item>
                                    <img src="{{ asset('galeri/' . $image) }}" class="w-full h-96 bg-center object-cover" alt="Gallery Image {{ $index + 1 }}">
                                </div>
                            @endforeach
                        </div>
                        <!-- Slider controls -->
                        <button type="button" class="absolute top-0 start-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none" data-carousel-prev>
                            <span class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 group-hover:bg-white/50 group-focus:ring-4 group-focus:ring-white group-focus:outline-none">
                                <svg class="w-4 h-4 text-white rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 1 1 5l4 4"/>
                                </svg>
                                <span class="sr-only">Previous</span>
                            </span>
                        </button>
                        <button type="button" class="absolute top-0 end-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none" data-carousel-next>
                            <span class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 group-hover:bg-white/50 group-focus:ring-4 group-focus:ring-white group-focus:outline-none">
                                <svg class="w-4 h-4 text-white rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
                                </svg>
                                <span class="sr-only">Next</span>
                            </span>
                        </button>
                    </div>
                    <h5 class="mt-4 text-2xl font-bold">{{ $item->judul_galeri }}</h5>
                @endforeach
            </div>
            {{-- Spacer --}}
            <div class="flex flex-col md:flex-row items-start justify-between gap-4">
                <div class="w-full space-y-4">
                    <div class="p-4 bg-white rounded-md">
                        <div class="flex flex-row items-center justify-between mb-3">
                            <h5 class="text-lg font-bold">Berita Terbaru</h5>
                            <a href="{{ route('mahasiswa.berita') }}" class="text-sm">Lihat Semua</a>
                        </div>
                        @foreach ($berita as $item)
                            <div class="grid grid-cols-1 space-y-4">
                                <img src="{{ asset('berita/' . $item->gambar) }}" alt="{{ $item->nama }}" class="rounded-md w-full h-52 object-cover bg-center no-repeat">
                                <div class="flex flex-col space-y-1">
                                    <h5 class="text-xl font-bold">{{ $item->nama }}</h5>
                                    <p class="text-sm text-gray-500">{{ $item->created_at->format('F j, Y') }}</p>
                                </div>
                                <p class="text-base">{{ $item->deskripsi }}</p>
                            </div>
                        @endforeach
                    </div>
                    <div class="p-4 bg-white rounded-md">
                        <div class="flex flex-row items-center justify-between mb-3">
                            <h5 class="text-lg font-bold">Agenda terbaru</h5>
                            <h5 class="text-xs bg-slate-200 px-2 py-1 rounded-md font-bold">{{ $totalAgenda }}</h5>
                        </div>
                        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4">
                            @foreach ($agenda as $item)
                                <div class="ring-1 ring-slate-400 px-4 py-2 rounded-md h-fit">
                                    <div class="flex flex-col space-y-1">
                                        <h5 class="text-xl font-bold">{{ $item->nama }}</h5>
                                        <p class="text-sm text-gray-500">{{ $item->created_at->format('F j, Y') }}</p>
                                    </div>
                                    <p class="text-base truncate">{{ $item->deskripsi }}</p>
                                </div>
                            @endforeach
                        </div>
                        <a href="{{ route('mahasiswa.agenda') }}" class="w-full flex bg-slate-100 hover:bg-indigo-600 hover:text-white hover:transition-all py-2 justify-center rounded-md mt-4">Lihat Semua</a>
                    </div>
                </div>
                <div class="w-full md:w-96 space-y-4">
                    <div class="p-4 bg-white rounded-md">
                        <div class="flex flex-row items-center justify-between mb-2">
                            <h5 class="text-lg font-bold">Fakultas</h5>
                            <h5 class="text-xs bg-slate-200 px-2 py-1 rounded-md font-bold">{{ $totalFakultas }}</h5>
                        </div>
                        @foreach($fakultas as $item)
                            <div class="border-b pb-1">
                                <h5 class="font-medium">{{ $item->nama_prodi }}</h5>
                            </div>
                        @endforeach
                    </div>
                    <div class="p-4 bg-white rounded-md">
                        <div class="flex flex-row items-center justify-between mb-2">
                            <h5 class="text-lg font-bold">Alumni Aktif</h5>
                            <h5 class="text-xs bg-slate-200 px-2 py-1 rounded-md font-bold">{{ $totalAlumni }}</h5>
                        </div>
                        @foreach($alumni as $item)
                            <div class="flex flex-row items-center gap-x-2 space-y-2 border-b pb-1">
                                <img src="{{ asset('alumni/' . $item->foto) }}" alt="{{ $item->nama }}" class="rounded-md w-6 h-6">
                                <div class="flex flex-col">
                                    <h5 class="font-medium">{{ $item->nama }}</h5>
                                    <p class="text-sm text-slate-600">{{ $item->prodi }} - {{ $item->npm }}</p>
                                </div>
                            </div>
                        @endforeach
                        <a href="{{ route('mahasiswa.alumni') }}" class="w-full flex bg-slate-100 hover:bg-indigo-600 hover:text-white hover:transition-all py-2 justify-center rounded-md mt-2">Lihat Semua</a>
                    </div>
                    <div class="p-4 bg-white rounded-md">
                        <div class="flex flex-row items-center justify-between mb-2">
                            <h5 class="text-lg font-bold">Dosen Aktif</h5>
                            <h5 class="text-xs bg-slate-200 px-2 py-1 rounded-md font-bold">{{ $totalDosen }}</h5>
                        </div>
                        @foreach($dosen as $item)
                            <div class="flex flex-row items-center gap-x-2 space-y-2 border-b pb-1">
                                <div class="flex flex-col">
                                    <h5 class="font-medium">{{ $item->nama }}</h5>
                                    <p class="text-sm text-slate-600">NIDN : {{ $item->nidn }}</p>
                                    <p class="text-sm text-slate-600">Mengampu : {{ $item->mengampu }}</p>
                                </div>
                            </div>
                        @endforeach
                        {{-- <a href="{{ route('dosen.index') }}" class="w-full flex bg-slate-100 hover:bg-indigo-600 hover:text-white hover:transition-all py-2 justify-center rounded-md mt-2">Lihat Semua</a> --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>