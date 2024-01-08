<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-row items-center gap-x-2">
            <a href="{{ route('alumni.index') }}" class="font-normal text-lg text-gray-400 leading-tight">
                {{ __('Admin') }}
            </a>
            <span>/</span>
            <h2 class="font-semibold text-lg text-gray-800 leading-tight">
                {{ __('Daftar Alumni') }}
            </h2>
        </div>
    </x-slot>

    <div class="py-8">
        <div class="max-w-7xl mx-auto px-2 sm:px-6 lg:px-8">
            <div class="w-full bg-white p-4 shadow-md rounded-md mx-auto">
                <form action="{{ route('alumni.store') }}" method="POST" class="grid grid-cols-1" enctype="multipart/form-data">
                    @csrf
                    <div class="flex flex-col space-y-4 mb-6 border-b pb-4">
                        <h5 class="text-lg font-semibold">Pribadi</h5>
                        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4">
                            <div class="flex flex-col justify-between">
                                <label class="block mb-2 text-sm font-medium text-gray-900">Foto Alumni</label>
                                <input name="foto" type="file" accept="image/*" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full" required>
                            </div>
                            <div class="flex flex-col justify-between">
                                <label class="block mb-2 text-sm font-medium text-gray-900">Nama Alumni</label>
                                <textarea rows="1" name="nama" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500"></textarea>
                            </div>
                            <div class="flex flex-col justify-between">
                                <label class="block mb-2 text-sm font-medium text-gray-900">Alamat Alumni</label>
                                <textarea rows="1" name="alamat" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500"></textarea>
                            </div>
                            <div class="flex flex-col justify-between">
                                <label class="block mb-2 text-sm font-medium text-gray-900">Telepon/HP</label>
                                <textarea rows="1" name="kontak" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500"></textarea>
                            </div>
                            <div class="flex flex-col justify-between">
                                <label class="block mb-2 text-sm font-medium text-gray-900">Email</label>
                                <textarea rows="1" name="email" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500"></textarea>
                            </div>
                            <div class="flex flex-col justify-between">
                                <label class="block mb-2 text-sm font-medium text-gray-900">NPM Alumni</label>
                                <textarea rows="1" name="npm" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500"></textarea>
                            </div>
                            <div class="flex flex-col justify-between">
                                <label class="block mb-2 text-sm font-medium text-gray-900">Program Studi & Jurusan</label>
                                <select name="prodi" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                                    @foreach($jurusan as $item)
                                        <option value="{{ $item->nama_fakultas, $item->nama_prodi }}"{{ old('prodi') == $item->nama_fakultas && $item->nama_prodi ? 'selected' : '' }}>
                                            {{ $item->nama_fakultas }} - {{ $item->nama_prodi }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="flex flex-col justify-between">
                                <label class="block mb-2 text-sm font-medium text-gray-900">Tahun Lulus</label>
                                <input name="thn_lulus" type="date" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" required>
                            </div>
                        </div>
                    </div>
                    <div class="flex flex-col space-y-4 mb-6 border-b pb-4">
                        <h5 class="text-lg font-semibold">Pekerjaan</h5>
                        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4">
                            <div class="flex flex-col justify-between">
                                <label class="block mb-2 text-sm font-medium text-gray-900">Tempat Kerja</label>
                                <textarea rows="1" name="tempat_kerja" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500"></textarea>
                            </div>
                            <div class="flex flex-col justify-between">
                                <label class="block mb-2 text-sm font-medium text-gray-900">Alamat Tempat Kerja Sekarang</label>
                                <textarea rows="1" name="alamat_kerja" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500"></textarea>
                            </div>
                            <div class="flex flex-col justify-between">
                                <label class="block mb-2 text-sm font-medium text-gray-900">Nomor Telepon Tempat Kerja Sekarang</label>
                                <textarea rows="1" name="kontak_kerja" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500"></textarea>
                            </div>
                            <div class="flex flex-col justify-between">
                                <label class="block mb-2 text-sm font-medium text-gray-900">Setelah Lulus, Saudara/Saudari langsung Bekerja dan tempat Bekerja saudara sesuai dengan ijazah ( pada lembaga pendidikan )?</label>
                                <select name="sesuai_minat" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                                    <option value="Ya, Pada lembaga pendidikan"{{ old('sesuai_minat') == 'Ya, Pada lembaga pendidikan' ? 'selected' : '' }}>Ya, Pada lembaga pendidikan</option>
                                    <option value="Ya, Pada lembaga lain"{{ old('sesuai_minat') == 'Ya, Pada lembaga lain' ? 'selected' : '' }}>Ya, Pada lembaga lain</option>
                                    <option value="tidak, Saya berwiraswasta/usaha mandiri"{{ old('sesuai_minat') == 'tidak, Saya berwiraswasta/usaha mandiri' ? 'selected' : '' }}>tidak, Saya berwiraswasta/usaha mandiri</option>
                                    <option value="tidak bekerja"{{ old('sesuai_minat') == 'tidak bekerja' ? 'selected' : '' }}>tidak bekerja</option>
                                </select>                         
                            </div>
                            <div class="flex flex-col justify-between">
                                <label class="block mb-2 text-sm font-medium text-gray-900">Pada Saat mendapatkan pekerjaan pertama dari mana saudara mendapatkan informasi pekerjaan tersebut?</label>
                                <select name="info_kerja" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                                    <option value="Keluarga"{{ old('info_kerja') == 'Keluarga' ? 'selected' : '' }} >Keluarga</option>
                                    <option value="Teman kuliah"{{ old('info_kerja') == 'Teman kuliah' ? 'selected' : '' }} >Teman kuliah</option>
                                    <option value="Teman ( lainnya )"{{ old('info_kerja') == 'Teman ( lainnya )' ? 'selected' : '' }} >Teman ( lainnya )</option>
                                    <option value="Media cetak/elektronik"{{ old('info_kerja') == 'Media cetak/elektronik' ? 'selected' : '' }} >Media cetak/elektronik</option>
                                    <option value="Lainnya"{{ old('info_kerja') == 'Lainnya' ? 'selected' : '' }} >Lainnya</option>
                                </select>                              
                            </div>
                            <div class="flex flex-col justify-between">
                                <label class="block mb-2 text-sm font-medium text-gray-900">Lama waktu menunggu pekerjaan pertama ( opsional )</label>
                                <select name="waktu_kerja" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                                    <option value="Saya sudah bekerja ketika masih mahasiswa"{{ old('waktu_kerja') == 'Saya sudah bekerja ketika masih mahasiswa' ? 'selected' : '' }} >Saya sudah bekerja ketika masih mahasiswa</option>
                                    <option value="kurang dari 3 bulan"{{ old('waktu_kerja') == 'kurang dari 3 bulan' ? 'selected' : '' }} >kurang dari 3 bulan</option>
                                    <option value="3 bulan, tetapi < 6 bulan"{{ old('waktu_kerja') == '3 bulan, tetapi < 6 bulan' ? 'selected' : '' }} >3 bulan, tetapi < 6 bulan </option>
                                    <option value="6 bulan, tetapi < 9 bulan"{{ old('waktu_kerja') == '6 bulan, tetapi < 9 bulan' ? 'selected' : '' }} >6 bulan, tetapi < 9 bulan</option>
                                    <option value="9 bulan, tetapi < 12 bulan"{{ old('waktu_kerja') == '9 bulan, tetapi < 12 bulan' ? 'selected' : '' }} >9 bulan, tetapi < 12 bulan</option>
                                    <option value="Lebih atau sama 12 bulan"{{ old('waktu_kerja') == 'Lebih atau sama 12 bulan' ? 'selected' : '' }} >Lebih atau sama 12 bulan</option>
                                </select>                             
                            </div>
                            <div class="flex flex-col justify-between">
                                <label class="block mb-2 text-sm font-medium text-gray-900">Penyebab harus menunggu pekerjaan pertama (opsional)</label>
                                <select name="alasan" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                                    <option value="Persaingan Ketat" {{ old('alasan') == 'Persaingan Ketat' ? 'selected' : '' }} >Persaingan Ketat</option>
                                    <option value="Kurang Informasi" {{ old('alasan') == 'Kurang Informasi' ? 'selected' : '' }} >Kurang Informasi</option>
                                    <option value="Belum ada kesesuaian dengan rencana karir" {{ old('alasan') == 'Belum ada kesesuaian dengan rencana karir' ? 'selected' : '' }} >Belum ada kesesuaian dengan rencana karir</option>
                                    <option value="Menunggu kelengkapan administrasi" {{ old('alasan') == 'Menunggu kelengkapan administrasi' ? 'selected' : '' }} >Menunggu kelengkapan administrasi</option>
                                    <option value="Alasan Pribadi" {{ old('alasan') == 'Alasan Pribadi' ? 'selected' : '' }} >Alasan Pribadi</option>
                                </select>                             
                            </div>
                            <div class="flex flex-col justify-between">
                                <label class="block mb-2 text-sm font-medium text-gray-900">Penghasilan yang saudara terima perbulan pertama kali bekerja</label>
                                <select name="penghasilan_pertama" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                                    <option value="< 500 ribu" {{ old('penghasilan_pertama') == '< 500 ribu' ? 'selected' : '' }} >< 500 ribu</option>
                                    <option value="500 ribu - 750 ribu" {{ old('penghasilan_pertama') == '500 ribu - 750 ribu' ? 'selected' : '' }} >500 ribu - 750 ribu</option>
                                    <option value="750 ribu - 1 juta" {{ old('penghasilan_pertama') == '750 ribu - 1 juta' ? 'selected' : '' }} >750 ribu - 1 juta</option>
                                    <option value="1 juta - 1.5 juta" {{ old('penghasilan_pertama') == '1 juta - 1.5 juta' ? 'selected' : '' }} >1 juta - 1.5 juta</option>
                                    <option value="1.5 juta - 2.5 juta" {{ old('penghasilan_pertama') == '1.5 juta - 2.5 juta' ? 'selected' : '' }} >1.5 juta - 2.5 juta</option>
                                    <option value="2.5 juta keatas" {{ old('penghasilan_pertama') == '2.5 juta keatas' ? 'selected' : '' }} >2.5 juta keatas</option>
                                </select>                                
                            </div>
                            <div class="flex flex-col justify-between">
                                <label class="block mb-2 text-sm font-medium text-gray-900">Penghasilan yang saudara terima sekarang rata rata perbulan</label>
                                <select name="penghasilan_rata" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                                    <option value="< 500 ribu" {{ old('penghasilan_rata') == '< 500 ribu' ? 'selected' : '' }} >< 500 ribu</option>
                                    <option value="500 ribu - 750 ribu" {{ old('penghasilan_rata') == '500 ribu - 750 ribu' ? 'selected' : '' }} >500 ribu - 750 ribu</option>
                                    <option value="750 ribu - 1 juta" {{ old('penghasilan_rata') == '750 ribu - 1 juta' ? 'selected' : '' }} >750 ribu - 1 juta</option>
                                    <option value="1 juta - 1.5 juta" {{ old('penghasilan_rata') == '1 juta - 1.5 juta' ? 'selected' : '' }} >1 juta - 1.5 juta</option>
                                    <option value="1.5 juta - 2.5 juta" {{ old('penghasilan_rata') == '1.5 juta - 2.5 juta' ? 'selected' : '' }} >1.5 juta - 2.5 juta</option>
                                    <option value="2.5 juta keatas" {{ old('penghasilan_rata') == '2.5 juta keatas' ? 'selected' : '' }} >2.5 juta keatas</option>
                                </select>                                
                            </div>
                            <div class="flex flex-col justify-between">
                                <label class="block mb-2 text-sm font-medium text-gray-900">Riwayat Pekerjaan sejak lulus dari Universitas Labuhan Batu Rantauprapat Sumatera Utara hingga mendapat pekerjaan Saat ini</label>
                                <textarea rows="1" name="riwayat_kerja" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500"></textarea>
                            </div>
                            <div class="flex flex-col justify-between">
                                <label class="block mb-2 text-sm font-medium text-gray-900">Nama dan alamat lembaga pendidikan tempat saudara bekerja sekarang</label>
                                <textarea rows="1" name="nama_alamat_lembaga" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500"></textarea>
                            </div>
                            <div class="flex flex-col justify-between">
                                <label class="block mb-2 text-sm font-medium text-gray-900">Bentuk lembaga pendidikan tempat saudara bekerja</label>
                                <select name="kategori_lembaga" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                                    <option value="Negeri" {{ old('kategori_lembaga') == 'Negeri' ? 'selected' : '' }} >Negeri</option>
                                    <option value="Swasta" {{ old('kategori_lembaga') == 'Swasta' ? 'selected' : '' }} >Swasta</option>
                                </select>                             
                            </div>
                            <div class="flex flex-col justify-between">
                                <label class="block mb-2 text-sm font-medium text-gray-900">Status saudara saat ini</label>
                                <select name="status" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                                    <option value="PNS (guru) Depag" {{ old('status') == 'PNS (guru) Depag' ? 'selected' : '' }} >PNS (guru) Depag</option>
                                    <option value="PNS (guru) Diknas" {{ old('status') == 'PNS (guru) Diknas' ? 'selected' : '' }} >PNS (guru) Diknas</option>
                                    <option value="PNS Instansi lainnya" {{ old('status') == 'PNS Instansi lainnya' ? 'selected' : '' }} >PNS Instansi lainnya</option>
                                    <option value="Guru swasta" {{ old('status') == 'Guru swasta' ? 'selected' : '' }} >Guru swasta</option>
                                    <option value="Pegawai Swasta (Disekolag/Depag/Diknas)" {{ old('status') == 'Pegawai Swasta (Disekolag/Depag/Diknas)' ? 'selected' : '' }} >Pegawai Swasta (Disekolag/Depag/Diknas)</option>
                                </select>                                
                            </div>
                            <div class="flex flex-col justify-between">
                                <label class="block mb-2 text-sm font-medium text-gray-900">Pangkat dan golongan saat ini ( opsional )</label>
                                <textarea rows="1" name="pangkat" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500"></textarea>
                            </div>
                            <div class="flex flex-col justify-between">
                                <label class="block mb-2 text-sm font-medium text-gray-900">Jabatan pekerjaan saat ini ( opsional )</label>
                                <textarea rows="1" name="jabaran" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="flex flex-col space-y-4 mb-6 border-b pb-4">
                        <h5 class="text-lg font-semibold">Kritik dan saran</h5>
                        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4">
                            <div class="flex flex-col justify-between">
                                <label class="block mb-2 text-sm font-medium text-gray-900">Berikan saran Kepada program studi di ULB tentang peningkatan kegiatan program studi</label>
                                <textarea rows="1" name="saran_prodi" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500"></textarea>
                            </div>
                            <div class="flex flex-col justify-between">
                                <label class="block mb-2 text-sm font-medium text-gray-900">Berikan saran kepada program studi di ULB tentang himpunan alumni</label>
                                <textarea rows="1" name="saran_himal" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500"></textarea>
                            </div>
                            <div class="flex flex-col justify-between">
                                <label class="block mb-2 text-sm font-medium text-gray-900">Berikan saran kepada program studi di ULB tentang temu dosen-mahasiswa-alumni</label>
                                <textarea rows="1" name="saran_dosen" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500"></textarea>
                            </div>
                            <div class="flex flex-col justify-between">
                                <label class="block mb-2 text-sm font-medium text-gray-900">Selama saudara mendapatkan pendidikan di Program Studi di ULB, bagaimana pengalaman saudara berinteraksi dengan Pimpinan ULB</label>
                                <select name="interaksi_pimpinan" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                                    <option value="Sangat Memuaskan" {{ old('interaksi_pimpinan') == 'Sangat Memuaskan' ? 'selected' : '' }} >Sangat Memuaskan</option>
                                    <option value="Memuaskan" {{ old('interaksi_pimpinan') == 'Memuaskan' ? 'selected' : '' }} >Memuaskan</option>
                                    <option value="Tidak ada pendapat" {{ old('interaksi_pimpinan') == 'Tidak ada pendapat' ? 'selected' : '' }} >Tidak ada pendapat</option>
                                    <option value="Tidak memuaskan" {{ old('interaksi_pimpinan') == 'Tidak memuaskan' ? 'selected' : '' }} >Tidak memuaskan</option>
                                    <option value="Sangat tidak memuaskan" {{ old('interaksi_pimpinan') == 'Sangat tidak memuaskan' ? 'selected' : '' }} >Sangat tidak memuaskan</option>
                                </select>                              
                            </div>
                            <div class="flex flex-col justify-between">
                                <label class="block mb-2 text-sm font-medium text-gray-900">Selama saudara mendapatkan pendidikan di Program Studi di ULB, bagaimana pengalaman saudara tentang pelayanan kemahasiswaan</label>
                                <select name="layanan_kemahasiswaan" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                                    <option value="Sangat Memuaskan" {{ old('layanan_kemahasiswaan') == 'Sangat Memuaskan' ? 'selected' : '' }} >Sangat Memuaskan</option>
                                    <option value="Memuaskan" {{ old('layanan_kemahasiswaan') == 'Memuaskan' ? 'selected' : '' }} >Memuaskan</option>
                                    <option value="Tidak ada pendapat" {{ old('layanan_kemahasiswaan') == 'Tidak ada pendapat' ? 'selected' : '' }} >Tidak ada pendapat</option>
                                    <option value="Tidak memuaskan" {{ old('layanan_kemahasiswaan') == 'Tidak memuaskan' ? 'selected' : '' }} >Tidak memuaskan</option>
                                    <option value="Sangat tidak memuaskan" {{ old('layanan_kemahasiswaan') == 'Sangat tidak memuaskan' ? 'selected' : '' }} >Sangat tidak memuaskan</option>
                                </select>                               
                            </div>
                            <div class="flex flex-col justify-between">
                                <label class="block mb-2 text-sm font-medium text-gray-900">Informasi Keberadaan Teman ( 5 Orang )</label>
                                <textarea rows="1" name="info_teman" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" required></textarea>
                            </div>
                            <div class="flex flex-col justify-between">
                                <label class="block mb-2 text-sm font-medium text-gray-900">Kesediaan saudara sebagai alumni untuk ikut membesarkan nama kampus ULB dalam meningkatkan daya saing lulusan Program Studi di kampus ULB</label>
                                <select name="kesiapan_saudara" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                                    <option value="Sebagai Donatur tetap" {{ old('kesiapan_saudara') == 'Sebagai Donatur tetap' ? 'selected' : '' }} >Sebagai Donatur tetap</option>
                                    <option value="Menyumbang sekali ini saja" {{ old('kesiapan_saudara') == 'Menyumbang sekali ini saja' ? 'selected' : '' }} >Menyumbang sekali ini saja</option>
                                    <option value="Menyumbang fasilitas prasarana kampus" {{ old('kesiapan_saudara') == 'Menyumbang fasilitas prasarana kampus' ? 'selected' : '' }} >Menyumbang fasilitas prasarana kampus</option>
                                    <option value="Saya akan memberikan/ membantu mencari bantuan" {{ old('kesiapan_saudara') == 'Saya akan memberikan/ membantu mencari bantuan' ? 'selected' : '' }} >Saya akan memberikan/ membantu mencari bantuan</option>
                                </select>                               
                            </div>
                            <div class="flex flex-col justify-between">
                                <label class="block mb-2 text-sm font-medium text-gray-900">Dalam pengembangan jejaring</label>
                                <select name="jejaring" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                                    <option value="Saya akan serius untuk menangani ikatan alumni" {{ old('jejaring') == 'Saya akan serius untuk menangani ikatan alumni' ? 'selected' : '' }} >Saya akan serius untuk menangani ikatan alumni</option>
                                    <option value="Saya akan membantu menyediakan bursa kerja bagi alumni yang belum kerja" {{ old('jejaring') == 'Saya akan membantu menyediakan bursa kerja bagi alumni yang belum kerja' ? 'selected' : '' }} >Saya akan membantu menyediakan bursa kerja bagi alumni yang belum kerja</option>
                                    <option value="Saya akan memberikan akses untuk memperoleh beasiswa kerjasama penelitian dan pengabdian masyarakat" {{ old('jejaring') == 'Saya akan memberikan akses untuk memperoleh beasiswa kerjasama penelitian dan pengabdian masyarakat' ? 'selected' : '' }} >Saya akan memberikan akses untuk memperoleh beasiswa kerjasama penelitian dan pengabdian masyarakat</option>
                                    <option value="Lainnya" {{ old('jejaring') == 'Lainnya' ? 'selected' : '' }} >Lainnya</option>
                                </select>                              
                            </div>
                            <div class="flex flex-col justify-between">
                                <label class="block mb-2 text-sm font-medium text-gray-900">Penyediaan fasilitas untuk kegiatan akademik</label>
                                <textarea name="penyedia_fasilitas" rows="1" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500"></textarea>
                            </div>
                            <div class="flex flex-col justify-between">
                                <label class="block mb-2 text-sm font-medium text-gray-900">Berikan catatan khusus untuk pengembangan program studi</label>
                                <textarea name="catatan_prodi" rows="1" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500"></textarea>
                            </div>
                        </div>
                    </div>
                    <button class="w-full py-2 bg-black text-white rounded-md" type="submit">Tambahkan</button>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>