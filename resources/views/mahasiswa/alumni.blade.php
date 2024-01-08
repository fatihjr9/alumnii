<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-row items-center justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('List Alumni') }}
            </h2>
            @if(!$filled)
                <a href="{{ route('mahasiswa.alumni.create') }}" class="px-4 py-2 bg-indigo-800 text-white w-fit rounded-md">Daftar Alumni</a>
            @endif    
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
                                Lainnya
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
                                    <button data-modal-target="modal-{{ $item->nama }}" data-modal-toggle="modal-{{ $item->nama }}" class="underline" type="button">
                                        Lihat Detail
                                    </button>
                                    <div id="modal-{{ $item->nama }}" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 inset-x-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                                        <div class="relative w-full max-w-5xl max-h-full overflow-y-scroll">
                                            <div class="relative bg-white rounded-lg shadow p-6">
                                                <button type="button" class="text-gray-900 float-end" data-modal-hide="modal-{{ $item->id }}">
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
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>