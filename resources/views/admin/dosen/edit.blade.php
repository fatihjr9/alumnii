<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-row items-center gap-x-2">
            <a href="{{ route('dosen.index') }}" class="font-normal text-lg text-gray-400 leading-tight">
                {{ __('Dosen') }}
            </a>
            <span>/</span>
            <h2 class="font-semibold text-lg text-gray-800 leading-tight">
                {{ __('Edit') }}
            </h2>
        </div>
    </x-slot>

    <div class="py-8">
        <div class="max-w-7xl mx-auto px-2 sm:px-6 lg:px-8">
            <div class="w-full md:w-96 bg-white p-4 shadow-md rounded-md mx-auto">
                <h5 class="text-lg font-bold border-b pb-2">Tambah Dosen</h5>
                <form action="{{ route('dosen.update', $dosen->id) }}" method="POST" class="flex flex-col space-y-4 mt-4">
                    @csrf
                    @method('PUT')
                    <div>
                        <label class="block mb-2 text-sm font-medium text-gray-900">Nama Dosen</label>
                        <input name="nama" type="text" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" required>
                    </div>
                    <div>
                        <label class="block mb-2 text-sm font-medium text-gray-900">NIDN Dosen</label>
                        <input name="nidn" type="text" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" required>
                    </div>
                    <div>
                        <label class="block mb-2 text-sm font-medium text-gray-900">Mengampu</label>
                        <input name="mengampu" type="text" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" required>
                    </div>
                    <button class="w-full py-2 bg-black text-white rounded-md" type="submit">Tambahkan</button>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>