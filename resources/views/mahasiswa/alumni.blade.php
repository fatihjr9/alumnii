<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-row items-center justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('List Alumni') }}
            </h2>
            <div class="flex flex-row items-center gap-x-2">
                <form action="{{ route('mahasiswa.alumni') }}" method="GET">   
                    <div class="relative md:w-80">
                        <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                            <svg class="w-4 h-4 text-gray-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"/>
                            </svg>
                        </div>
                        <input type="search" name="search" id="default-search" class="block w-full p-2 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500" placeholder="Cari Berdasarkan Nama, Nim atau Jurusan" required>
                    </div>
                </form>
                @if(!$filled)
                    <a href="{{ route('mahasiswa.alumni.create') }}" class="px-4 py-2 bg-gray-300 text-black flex flex-row gap-x-1 rounded-md w-fit">Daftar Alumni</a>
                @endif   
            </div> 
        </div>
    </x-slot>

    <div class="py-8">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
                @foreach($alumnis as $item)
                    <div class="bg-white rounded-md">
                        <img src="{{ asset('alumni/' . $item->foto) }}" alt="{{ $item->nama }}" class="rounded-t-md w-full h-40 object-cover bg-center">
                        <div class="p-2 flex flex-col space-y-2">
                            <div class="flex flex-col">
                                <h5 class="text-lg font-semibold">{{ $item->nama }}</h5>
                                <p class="text-sm text-slate-600">{{ $item->prodi }} - {{ $item->npm }}</p>
                            </div>
                            <div>
                                {{-- Modal --}}
                                <button data-modal-target="modal-{{ $item->nama }}" data-modal-toggle="modal-{{ $item->nama }}" class="w-full py-2 bg-slate-200 rounded-md text-sm" type="button">
                                    Lihat Detail
                                </button>
                                <div id="modal-{{ $item->nama }}" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 inset-x-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                                    <div class="relative w-full max-w-5xl max-h-full overflow-y-scroll">
                                        <div class="relative bg-white rounded-lg shadow p-6">
                                            <button type="button" class="text-gray-900 float-end" data-modal-hide="modal-{{ $item->nama }}">
                                                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                                                </svg>
                                            </button>
                                            <div class="grid grid-cols-1 gap-4 space-y-4">
                                                {{-- space --}}
                                                <div class="flex flex-col space-y-4">
                                                    <h5 class="text-black font-semibold">Pribadi</h5>
                                                    <div class="grid grid-cols-1 lg:grid-cols-2 gap-4 md:gap-8">
                                                        <div class="flex flex-col pl-4 border-b pb-2 gap-y-1 justify-between">
                                                            <h5 class="text-sm text-black font-medium">Tahun Lulus</h5>
                                                            <p class="text-sm">{{ $item->thn_lulus }}</p>
                                                        </div>
                                                        <div class="flex flex-col pl-4 border-b pb-2 gap-y-1 justify-between">
                                                            <h5 class="text-sm text-black font-medium">Alamat</h5>
                                                            <p class="text-sm">{{ $item->alamat }}</p>
                                                        </div>
                                                        <div class="flex flex-col pl-4 border-b pb-2 gap-y-1 justify-between">
                                                            <h5 class="text-sm text-black font-medium">Telepon/HP</h5>
                                                            <p class="text-sm">{{ $item->kontak }}</p>
                                                        </div>
                                                        <div class="flex flex-col pl-4 border-b pb-2 gap-y-1 justify-between">
                                                            <h5 class="text-sm text-black font-medium">Email</h5>
                                                            <p class="text-sm">{{ $item->email }}</p>
                                                        </div>
                                                    </div>
                                                </div>
                                                {{-- space --}}
                                                <div class="flex flex-col space-y-4">
                                                    <h5 class="text-black font-semibold">Pekerjaan</h5>
                                                    <div class="grid grid-cols-1 lg:grid-cols-2 gap-4 md:gap-8">
                                                        <div class="flex flex-col pl-4 border-b pb-2 gap-y-1 justify-between">
                                                            <h5 class="text-sm text-black font-medium">Tempat Kerja</h5>
                                                            <p class="text-sm">{{ $item->tempat_kerja }}</p>
                                                        </div>
                                                        <div class="flex flex-col pl-4 border-b pb-2 gap-y-1 justify-between">
                                                            <h5 class="text-sm text-black font-medium">Alamat Tempat Kerja Sekarang</h5>
                                                            <p class="text-sm">{{ $item->alamat_kerja }}</p>
                                                        </div>
                                                        <div class="flex flex-col pl-4 border-b pb-2 gap-y-1 justify-between">
                                                            <h5 class="text-sm text-black font-medium">Nomor Telepon Tempat Kerja Sekarang</h5>
                                                            <p class="text-sm">{{ $item->kontak_kerja }}</p>
                                                        </div>
                                                        <div class="flex flex-col pl-4 border-b pb-2 gap-y-1 justify-between">
                                                            <h5 class="text-sm text-black font-medium">Setelah Lulus, Saudara/Saudari langsung Bekerja dan tempat Bekerja saudara sesuai dengan ijazah ( pada lembaga pendidikan )?</h5>
                                                            <p class="text-sm">{{ $item->sesuai_minat }}</p>
                                                        </div>
                                                        <div class="flex flex-col pl-4 border-b pb-2 gap-y-1 justify-between">
                                                            <h5 class="text-sm text-black font-medium">Pada Saat mendapatkan pekerjaan pertama dari mana saudara mendapatkan informasi pekerjaan tersebut?</h5>
                                                            <p class="text-sm">{{ $item->info_kerja }}</p>
                                                        </div>
                                                        <div class="flex flex-col pl-4 border-b pb-2 gap-y-1 justify-between">
                                                            <h5 class="text-sm text-black font-medium">Lama waktu menunggu pekeraan pertama ( opsional )</h5>
                                                            <p class="text-sm">{{ $item->waktu_kerja }}</p>
                                                        </div>
                                                        <div class="flex flex-col pl-4 border-b pb-2 gap-y-1 justify-between">
                                                            <h5 class="text-sm text-black font-medium">Penyebab harus menunggu pekerjaan pertama (opsional)</h5>
                                                            <p class="text-sm">{{ $item->alasan }}</p>
                                                        </div>
                                                        <div class="flex flex-col pl-4 border-b pb-2 gap-y-1 justify-between">
                                                            <h5 class="text-sm text-black font-medium">Penghasilan yang saudara terima perbulan pertama kali bekerja</h5>
                                                            <p class="text-sm">{{ $item->penghasilan_pertama }}</p>
                                                        </div>
                                                        <div class="flex flex-col pl-4 border-b pb-2 gap-y-1 justify-between">
                                                            <h5 class="text-sm text-black font-medium">Penghasilan yang saudara terima sekarang rata rata perbulan</h5>
                                                            <p class="text-sm">{{ $item->penghasilan_rata }}</p>
                                                        </div>
                                                        <div class="flex flex-col pl-4 border-b pb-2 gap-y-1 justify-between">
                                                            <h5 class="text-sm text-black font-medium">Riwayat Pekerjaan sejak lulus dari Universitas Labuhan Batu Rantauprapat Sumatera Utara hingga mendapat pekerjaan Saat ini</h5>
                                                            <p class="text-sm">{{ $item->riwayat_kerja }}</p>
                                                        </div>
                                                        <div class="flex flex-col pl-4 border-b pb-2 gap-y-1 justify-between">
                                                            <h5 class="text-sm text-black font-medium">Nama dan alamat lembaga pendidikan tempat saudara bekerja sekarang</h5>
                                                            <p class="text-sm">{{ $item->nama_alamat_lembaga }}</p>
                                                        </div>
                                                        <div class="flex flex-col pl-4 border-b pb-2 gap-y-1 justify-between">
                                                            <h5 class="text-sm text-black font-medium">Bentuk lembaga pendidikan tempat saudara bekerja</h5>
                                                            <p class="text-sm">{{ $item->kategori_lembaga }}</p>
                                                        </div>
                                                        <div class="flex flex-col pl-4 border-b pb-2 gap-y-1 justify-between">
                                                            <h5 class="text-sm text-black font-medium">Status saudara saat ini</h5>
                                                            <p class="text-sm">{{ $item->status }}</p>
                                                        </div>
                                                        <div class="flex flex-col pl-4 border-b pb-2 gap-y-1 justify-between">
                                                            <h5 class="text-sm text-black font-medium">Pangkat dan golongan saat ini ( opsional )</h5>
                                                            <p class="text-sm">{{ $item->pangkat }}</p>
                                                        </div>
                                                        <div class="flex flex-col pl-4 border-b pb-2 gap-y-1 justify-between">
                                                            <h5 class="text-sm text-black font-medium">Jabatan pekerjaan saat ini ( opsional )</h5>
                                                            <p class="text-sm">{{ $item->jabaran }}</p>
                                                        </div>
                                                    </div>
                                                </div>
                                                {{-- space --}}
                                                <div class="flex flex-col space-y-4">
                                                    <h5 class="text-black font-semibold">Kritik dan Saran</h5>
                                                    <div class="grid grid-cols-1 lg:grid-cols-2 gap-4 md:gap-8">
                                                        <div class="flex flex-col pl-4 border-b pb-2 gap-y-1 justify-between">
                                                            <h5 class="text-sm text-black font-medium">Berikan saran Kepada program studi di ULB tentang peningkatan kegiatan program studi</h5>
                                                            <p class="text-sm">{{ $item->saran_prodi }}</p>
                                                        </div>
                                                        <div class="flex flex-col pl-4 border-b pb-2 gap-y-1 justify-between">
                                                            <h5 class="text-sm text-black font-medium">Berikan saran kepada program studi di ULB tentang himpunan alumni</h5>
                                                            <p class="text-sm">{{ $item->saran_himal }}</p>
                                                        </div>
                                                        <div class="flex flex-col pl-4 border-b pb-2 gap-y-1 justify-between">
                                                            <h5 class="text-sm text-black font-medium">Berikan saran kepada program studi di ULB tentang temu dosen-mahasiswa-alumni</h5>
                                                            <p class="text-sm">{{ $item->saran_dosen }}</p>
                                                        </div>
                                                        <div class="flex flex-col pl-4 border-b pb-2 gap-y-1 justify-between">
                                                            <h5 class="text-sm text-black font-medium">Selama saudara mendapatkan pendidikan di Program Studi di ULB, bagaimana pengalaman saudara berinteraksi dengan Pimpinan ULB</h5>
                                                            <p class="text-sm">{{ $item->interaksi_pimpinan }}</p>
                                                        </div>
                                                        <div class="flex flex-col pl-4 border-b pb-2 gap-y-1 justify-between">
                                                            <h5 class="text-sm text-black font-medium">Selama saudara mendapatkan pendidikan di Program Studi di ULB, bagaimana pengalaman saudara tentang pelayanan kemahasiswaan</h5>
                                                            <p class="text-sm">{{ $item->layanan_kemahasiswaan }}</p>
                                                        </div>
                                                        <div class="flex flex-col pl-4 border-b pb-2 gap-y-1 justify-between">
                                                            <h5 class="text-sm text-black font-medium">Informasi Keberadaan Teman ( 5 Orang saja )</h5>
                                                            <p class="text-sm">{{ $item->info_teman }}</p>
                                                        </div>
                                                        <div class="flex flex-col pl-4 border-b pb-2 gap-y-1 justify-between">
                                                            <h5 class="text-sm text-black font-medium">Kesediaan saudara sebagai alumni untuk ikut membesarkan nama kampus ULB dalam meningkatkan daya saing lulusan Program Studi di kampus ULB</h5>
                                                            <p class="text-sm">{{ $item->kesiapan_saudara }}</p>
                                                        </div>
                                                        <div class="flex flex-col pl-4 border-b pb-2 gap-y-1 justify-between">
                                                            <h5 class="text-sm text-black font-medium">Dalam pengembangan jejaring</h5>
                                                            <p class="text-sm">{{ $item->jejaring }}</p>
                                                        </div>
                                                        <div class="flex flex-col pl-4 border-b pb-2 gap-y-1 justify-between">
                                                            <h5 class="text-sm text-black font-medium">Penyediaan fasilitas untuk kegiatan akademik</h5>
                                                            <p class="text-sm">{{ $item->penyedia_fasilitas }}</p>
                                                        </div>
                                                        <div class="flex flex-col pl-4 border-b pb-2 gap-y-1 justify-between">
                                                            <h5 class="text-sm text-black font-medium">Berikan catatan khusus untuk pengembangan program studi</h5>
                                                            <p class="text-sm">{{ $item->catatan_prodi }}</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</x-app-layout>