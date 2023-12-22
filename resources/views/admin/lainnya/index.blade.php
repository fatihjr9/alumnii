<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Lainnya') }}
        </h2>
    </x-slot>

    <div class="py-8">
        <div class="max-w-7xl mx-auto px-2 sm:px-6 lg:px-8">
            <div class="flex flex-col md:flex-row items-start justify-between gap-4">
                <div class="w-80 p-4 bg-white rounded-md shadow-md space-y-2 flex flex-col">
                    <a href="#fakultas" class="text-base hover:text-indigo-600">Fakultas</a>
                    <a href="#galeri" class="text-base hover:text-indigo-600">Galeri</a>
                    <a href="#slider" class="text-base hover:text-indigo-600">Slider</a>
                    <a href="#kontak" class="text-base hover:text-indigo-600">Kontak</a>
                </div>
                <div class="w-full space-y-4">
                    {{-- fakultas --}}
                    <div class="border-b bg-white p-4 rounded-md shadow-sm space-y-4" id="fakultas">
                        <div class="flex flex-row items-center justify-between">
                            <h5 class="text-xl font-bold">Fakultas dan Program Studi</h5>
                            <a href="{{ route('lainnya.tambah-fakultas') }}" class="px-4 py-2 bg-gray-300 text-black flex flex-row gap-x-1 rounded-md w-fit ml-auto items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-3 h-3">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v12m6-6H6" />
                                </svg>                      
                                <span class="text-sm font-medium">Tambah</span>                    
                            </a>
                        </div>
                        <div class="relative overflow-x-auto">
                            <table class="w-full text-sm text-left rtl:text-right text-gray-500">
                                <thead class="text-xs text-gray-700 uppercase bg-slate-100">
                                    <tr>
                                        <th scope="col" class="px-6 py-3">
                                            Nama Fakultas
                                        </th>
                                        <th scope="col" class="px-6 py-3">
                                            Nama Program Studi
                                        </th>
                                        <th scope="col" class="px-6 py-3">
                                            Action
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if(isset($fakultas) && count($fakultas) > 0)
                                        @foreach ($fakultas as $item)
                                            <tr class="border-b">
                                                <td class="px-6 py-4">
                                                    {{ $item->nama_fakultas }}
                                                </td>
                                                <td class="px-6 py-4">
                                                    {{ $item->nama_prodi }}
                                                </td>
                                                <td class="px-6 py-4">
                                                    <a href="#" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit</a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    @else
                                        <p>No faculty data available.</p>
                                    @endif
                                </tbody>
                            </table>
                        </div>
                    </div>
                    {{-- collection --}}
                    <div class="border-b bg-white p-4 rounded-md shadow-sm space-y-4" id="galeri">
                        <div class="flex flex-row items-center justify-between">
                            <h5 class="text-xl font-bold">Galeri</h5>
                            <a href="/lainnya/tambah-collection" class="px-4 py-2 bg-gray-300 text-black flex flex-row gap-x-1 rounded-md w-fit ml-auto items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-3 h-3">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v12m6-6H6" />
                                </svg>                      
                                <span class="text-sm font-medium">Tambah</span>                    
                            </a>
                        </div>
                        <div class="relative overflow-x-auto">
                            <table class="w-full text-sm text-left rtl:text-right text-gray-500">
                                <thead class="text-xs text-gray-700 uppercase bg-slate-100">
                                    <tr>
                                        <th scope="col" class="px-6 py-3">
                                            Nama Collection
                                        </th>
                                        <th scope="col" class="px-6 py-3">
                                            Gambar
                                        </th>
                                        <th scope="col" class="px-6 py-3">
                                            Action
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if(isset($fakultas) && count($fakultas) > 0)
                                        @foreach ($fakultas as $item)
                                            <tr class="border-b">
                                                <td class="px-6 py-4">
                                                    {{ $item->nama_fakultas }}
                                                </td>
                                                <td class="px-6 py-4">
                                                    {{ $item->nama_prodi }}
                                                </td>
                                                <td class="px-6 py-4">
                                                    <a href="#" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit</a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    @else
                                        <p>No faculty data available.</p>
                                    @endif
                                </tbody>
                            </table>
                        </div>
                    </div>
                    {{-- Kontak --}}
                    <div class="border-b bg-white p-4 rounded-md shadow-sm space-y-4" id="kontak">
                        <div class="flex flex-row items-center justify-between">
                            <h5 class="text-xl font-bold">Kontak</h5>
                            <a href="{{ route('lainnya.tambah-kontak.create') }}" class="px-4 py-2 bg-gray-300 text-black flex flex-row gap-x-1 rounded-md w-fit ml-auto items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-3 h-3">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v12m6-6H6" />
                                </svg>                      
                                <span class="text-sm font-medium">Tambah</span>                    
                            </a>
                        </div>
                        <div class="relative overflow-x-auto">
                            <table class="w-full text-sm text-left rtl:text-right text-gray-500">
                                <thead class="text-xs text-gray-700 uppercase bg-slate-100">
                                    <tr>
                                        <th scope="col" class="px-6 py-3">
                                            Icon Kontak
                                        </th>
                                        <th scope="col" class="px-6 py-3">
                                            Alamat/Nomor Kontak
                                        </th>
                                        <th scope="col" class="px-6 py-3">
                                            Action
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($kontak as $item)
                                    <tr class="border-b">
                                        <td class="px-6 py-4">
                                            <img src="{{ asset('icon/' . $item->icon) }}" alt="{{ $item->alamat_kontak }}" class="w-16 h-16 rounded-md">
                                        </td>
                                        <td class="px-6 py-4">
                                            {{ $item->alamat_kontak }}
                                        </td>
                                        <td class="px-6 py-4">
                                            <a href="#" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit</a>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>