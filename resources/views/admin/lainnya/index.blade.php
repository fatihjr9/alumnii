<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Lainnya') }}
        </h2>
    </x-slot>

    <div class="py-8">
        <div class="max-w-7xl mx-auto px-2 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
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
                                                <td class="px-6 py-4 flex flex-row items-center gap-x-1">
                                                    <a href="{{ route('lainnya.edit-fakultas', $item->id) }}" class="hover:text-orange-600 transition-all px-3 py-1.5 bg-slate-100 rounded-sml">Edit</a>
                                                    <form action="{{ route('lainnya.destroy-fakultas', ['id' => $item->id]) }}" method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="hover:text-red-600 transition-all px-3 py-1.5 bg-slate-100 rounded-sm">Delete</button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach
                                    @else
                                    @endif
                                </tbody>
                            </table>
                        </div>
                </div>
                {{-- Galeri --}}
                <div class="border-b bg-white p-4 rounded-md shadow-sm space-y-4" id="galeri">
                        <div class="flex flex-row items-center justify-between">
                            <h5 class="text-xl font-bold">Galeri</h5>
                            <a href="{{ route('lainnya.tambah-galeri.create') }}" class="px-4 py-2 bg-gray-300 text-black flex flex-row gap-x-1 rounded-md w-fit ml-auto items-center">
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
                                            Nama Galeri
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
                                    @if(isset($galeri) && count($galeri) > 0)
                                        @foreach ($galeri as $item)
                                            <tr class="border-b border-gray-200 pb-4">
                                                <td class="px-6 py-4">
                                                    {{ $item->judul_galeri }}
                                                </td>
                                                <td class="px-6 py-4">
                                                    @if ($item->galeri)
                                                        @php
                                                            $decodedImages = json_decode($item->galeri);
                                                        @endphp                                                    

                                                        @if ($decodedImages && is_array($decodedImages))
                                                            <div class="flex flex-row items-center gap-x-1">
                                                                @foreach ($decodedImages as $image)
                                                                    <img src="{{ asset('galeri/' . $image) }}" alt="{{ $item->judul_galeri }}" class="w-16 h-16 rounded-md">
                                                                @endforeach
                                                            </div>
                                                        @else
                                                            <p>Error decoding images for {{ $item->judul_galeri }}</p>
                                                            <pre>{{ $item->galeri }}</pre>
                                                        @endif
                                                    @endif
                                                </td>
                                                <td class="px-6 py-4 flex flex-col w-full space-y-1">
                                                    <a href="{{ route('lainnya.edit-galeri.edit', $item->id) }}" class="hover:text-orange-600 transition-all px-3 py-1.5 bg-slate-100 rounded-sm">Edit</a>
                                                    <form action="{{ route('lainnya.galeri.delete', ['id' => $item->id]) }}" method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="hover:text-red-600 transition-all px-3 py-1.5 bg-slate-100 rounded-sm">Delete</button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach
                                    @else
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
                                        <td class="px-6 py-4 flex flex-col w-full space-y-1">
                                            <a href="{{ route('lainnya.edit-kontak.edit', $item->id) }}" class="hover:text-orange-600 transition-all text-center py-1.5 bg-slate-100 rounded-sm">Edit</a>
                                            <form action="{{ route('lainnya.destroy-kontak.destroy', $item->id) }}" method="post">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="hover:text-orange-600 transition-all w-full py-1.5 bg-slate-100 rounded-sm" onclick="return confirm('Yakin menghapus {{ $item->alamat_kontak }} ?')">Delete</button>
                                            </form> 
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
</x-app-layout>