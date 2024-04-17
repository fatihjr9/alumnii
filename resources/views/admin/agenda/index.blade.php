<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-row items-center justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight mb-0">
                {{ __('Agenda') }}
            </h2>
            <a href="{{ route('agenda.create') }}" class="px-4 py-2 bg-gray-300 text-black flex flex-row gap-x-1 rounded-md w-fit ml-auto items-center">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-3 h-3">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v12m6-6H6" />
                </svg>                      
                <span class="text-sm">Tambah Agenda</span>                    
            </a>
        </div>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-3">
                @forelse ($agendas as $item)
                    <div class="bg-white shadow-sm sm:rounded-lg p-4 space-y-4">
                        <div class="flex flex-col space-y-2">
                            <div class="flex flex-col">
                                <h5 class="text-lg font-bold">{{ $item->nama }}</h5>
                                <p class="text-sm text-slate-600">{{ \Carbon\Carbon::parse($item->tanggal)->format('d F Y') }}</p>
                            </div>
                            <p>{{ $item->deskripsi }}</p>
                        </div>
                        <div class="flex flex-row items-center gap-x-1 h-fit">
                            {{-- Modal --}}
                            <button data-modal-target="default-modal-{{ $item->id }}" data-modal-toggle="default-modal-{{ $item->id }}" class="w-full py-2 bg-slate-200 rounded-md" type="button">
                                Lihat Detail
                            </button>
                            <div id="default-modal-{{ $item->id }}" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                                <div class="relative p-4 w-full max-w-2xl max-h-full">
                                    <!-- Modal content -->
                                    <div class="relative bg-white rounded-lg shadow">
                                        <!-- Modal header -->
                                        <div class="flex items-center justify-between py-2 px-4 md:px-5 border-b rounded-t">
                                            <div class="flex flex-col space-y-1">
                                                <h3 class="text-xl font-semibold">{{ $item->nama }}</h3>
                                                <p class="text-sm text-slate-600">{{ \Carbon\Carbon::parse($item->tanggal)->format('d F Y') }}</p>
                                            </div>
                                            <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center" data-modal-hide="default-modal-{{ $item->id }}">
                                                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                                                </svg>
                                                <span class="sr-only">Close modal</span>
                                            </button>
                                        </div>
                                        <!-- Modal body -->
                                        <div class="p-4 md:p-5 space-y-4">
                                            <p class="text-base leading-relaxed text-gray-500">{{ $item->deskripsi }}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            {{-- Dropdown --}}
                            <button id="dropdownHoverButton-{{ $item->id }}" data-dropdown-toggle="dropdownHover-{{ $item->id }}" data-dropdown-trigger="hover" class="w-10 h-10 bg-slate-200 rounded-md" type="button">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4 mx-auto">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M6.75 12a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0ZM12.75 12a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0ZM18.75 12a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0Z" />
                                </svg>  
                            </button>
                            <div id="dropdownHover-{{ $item->id }}" class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44">
                                <ul class="py-2 text-sm" aria-labelledby="dropdownHoverButton-{{ $item->id }}">
                                  <li>
                                    <a href="{{ route('agenda.edit', $item->id) }}" class="block px-4 py-2 hover:bg-gray-100">Edit</a>
                                  </li>
                                  <li>
                                    <form action="{{ route('agenda.destroy', $item->id) }}" method="post" class="px-4 py-2 hover:bg-gray-100">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" onclick="return confirm('Yakin menghapus {{ $item->nama }}?')">Delete</button>
                                    </form>                                  
                                </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    @empty
                        <tr class="bg-white border-b text-black">
                            <td colspan="7" class="px-6 py-4 text-center">
                                Tidak ada data
                            </td>
                        </tr>
                @endforelse
            </div>
        </div>
    </div>
</x-app-layout>