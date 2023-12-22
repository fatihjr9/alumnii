<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Berita') }}
        </h2>
    </x-slot>

    <div class="py-8">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-md sm:rounded-lg p-4 space-y-4">
                <a href="{{ route('berita.create') }}" class="px-4 py-2 bg-gray-300 text-black flex flex-row gap-x-1 rounded-md w-fit ml-auto items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-3 h-3">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v12m6-6H6" />
                    </svg>                      
                    <span class="text-sm">Tambah Berita</span>                    
                </a>
                <div class="relative overflow-x-auto">
                    <table class="w-full text-sm text-left rtl:text-right text-gray-500">
                        <thead class="text-xs text-gray-700 uppercase bg-slate-100">
                            <tr>
                                <th scope="col" class="px-6 py-3">
                                    gambar
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Nama Berita
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Tanggal Berita
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Deskripsi
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Action
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($beritas as $item)
                            <tr class="border-b">
                                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                                    <img src="{{ asset('berita/' . $item->gambar) }}" alt="{{ $item->nama }}" class="w-16 h-16 rounded-md">
                                </th>
                                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                                    {{ $item->nama }}
                                </th>
                                <td class="px-6 py-4">
                                    {{ $item->tanggal }}
                                </td>
                                <td class="px-6 py-4 truncate">
                                    {{ $item->deskripsi }}
                                </td>
                                <td class="px-6 py-4">
                                    <a href="#" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit</a>
                                </td>
                            </tr>
                            @empty
                                <tr class="bg-white border-b text-black">
                                    <td colspan="7" class="px-6 py-4 text-center">
                                        Tidak ada data
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
