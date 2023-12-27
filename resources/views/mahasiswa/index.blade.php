<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-row items-center justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('List Alumni') }}
            </h2>
            <a href="{{ route('mahasiswa.alumni.create') }}" class="px-4 py-2 bg-indigo-800 text-white w-fit rounded-md">Daftar Alumni</a>
        </div>
    </x-slot>

    <div class="py-8">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="relative overflow-x-auto">
                <table class="w-full text-sm text-left rtl:text-right text-gray-500">
                    <thead class="text-xs text-gray-700 uppercase bg-slate-300">
                        <tr>
                            <th scope="col" class="px-6 py-3">
                                No
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Foto Alumni
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Nama Alumni
                            </th>
                            <th scope="col" class="px-6 py-3">
                                NPM
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Jurusan & Prodi
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Tahun Masuk
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Tahun Lulus
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($alumnis as $item)
                            <tr class="bg-gray-100 border-b border-gray-300">
                                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                                    {{ $loop->iteration }}
                                </th>
                                <td class="px-6 py-4">
                                    <img src="{{ asset('alumni/' . $item->foto) }}" alt="{{ $item->nama }}" class="rounded-md w-10 h-10">
                                </td>
                                <td class="px-6 py-4">
                                    {{ $item->nama }}
                                </td>
                                <td class="px-6 py-4">
                                    {{ $item->npm }}
                                </td>
                                <td class="px-6 py-4">
                                    {{ $item->prodi }}
                                </td>
                                <td class="px-6 py-4">
                                    {{ $item->thn_masuk }}
                                </td>
                                <td class="px-6 py-4">
                                    {{ $item->thn_lulus }}
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>