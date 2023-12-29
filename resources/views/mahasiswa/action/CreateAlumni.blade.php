<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-row items-center gap-x-2">
            <a href="{{ route('mahasiswa.alumni') }}" class="font-normal text-lg text-gray-400 leading-tight">
                {{ __('Alumni') }}
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
                <form action="{{ route('mahasiswa.alumni.store') }}" method="POST" class="grid grid-cols-1" enctype="multipart/form-data">
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
                                        <option value="{{ $item->id }}"{{ old('prodi') == $item->id ? 'selected' : '' }}>
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
                                    <option value="1"{{ old('sesuai_minat') == '1' ? 'selected' : '' }}>Ya, Pada lembaga pendidikan</option>
                                    <option value="2"{{ old('sesuai_minat') == '2' ? 'selected' : '' }}>Ya, Pada lembaga lain</option>
                                    <option value="3"{{ old('sesuai_minat') == '3' ? 'selected' : '' }}>tidak, Saya berwiraswasta/usaha mandiri</option>
                                    <option value="4"{{ old('sesuai_minat') == '4' ? 'selected' : '' }}>tidak bekerja</option>
                                </select>                         
                            </div>
                            <div class="flex flex-col justify-between">
                                <label class="block mb-2 text-sm font-medium text-gray-900">Pada Saat mendapatkan pekerjaan pertama dari mana saudara mendapatkan informasi pekerjaan tersebut?</label>
                                <select name="info_kerja" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                                    <option value="1"{{ old('info_kerja') == '1' ? 'selected' : '' }} >Keluarga</option>
                                    <option value="2"{{ old('info_kerja') == '2' ? 'selected' : '' }} >Teman kuliah</option>
                                    <option value="3"{{ old('info_kerja') == '3' ? 'selected' : '' }} >Teman ( lainnya )</option>
                                    <option value="4"{{ old('info_kerja') == '4' ? 'selected' : '' }} >Media cetak/elektronik</option>
                                    <option value="5"{{ old('info_kerja') == '5' ? 'selected' : '' }} >Lainnya</option>
                                </select>                              
                            </div>
                            <div class="flex flex-col justify-between">
                                <label class="block mb-2 text-sm font-medium text-gray-900">Lama waktu menunggu pekerjaan pertama ( opsional )</label>
                                <select name="waktu_kerja" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                                    <option value="1"{{ old('waktu_kerja') == '1' ? 'selected' : '' }} >Saya sudah bekerja ketika masih mahasiswa</option>
                                    <option value="2"{{ old('waktu_kerja') == '2' ? 'selected' : '' }} >kurang dari 3 bulan</option>
                                    <option value="3"{{ old('waktu_kerja') == '3' ? 'selected' : '' }} >3 bulan, tetapi < 6 bulan </option>
                                    <option value="4"{{ old('waktu_kerja') == '4' ? 'selected' : '' }} >6 bulan, tetapi < 9 bulan </option>
                                    <option value="5"{{ old('waktu_kerja') == '5' ? 'selected' : '' }} >9 bulan, tetapi < 12 bulan </option>
                                    <option value="6"{{ old('waktu_kerja') == '6' ? 'selected' : '' }} >Lebih atau sama 12 bulan</option>
                                </select>                             
                            </div>
                            <div class="flex flex-col justify-between">
                                <label class="block mb-2 text-sm font-medium text-gray-900">Penyebab harus menunggu pekerjaan pertama (opsional)</label>
                                <select name="alasan" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                                    <option value="1" {{ old('alasan') == '1' ? 'selected' : '' }} >Persaingan Ketat</option>
                                    <option value="2" {{ old('alasan') == '2' ? 'selected' : '' }} >Kurang Informasi</option>
                                    <option value="3" {{ old('alasan') == '3' ? 'selected' : '' }} >Belum ada kesesuaian dengan rencana karir</option>
                                    <option value="4" {{ old('alasan') == '4' ? 'selected' : '' }} >Menunggu kelengkapan administrasi</option>
                                    <option value="5" {{ old('alasan') == '5' ? 'selected' : '' }} >Alasan Pribadi</option>
                                </select>                             
                            </div>
                            <div class="flex flex-col justify-between">
                                <label class="block mb-2 text-sm font-medium text-gray-900">Penghasilan yang saudara terima perbulan pertama kali bekerja</label>
                                <select name="penghasilan_pertama" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                                    <option value="1" {{ old('penghasilan_pertama') == '1' ? 'selected' : '' }} >< 500 ribu</option>
                                    <option value="2" {{ old('penghasilan_pertama') == '2' ? 'selected' : '' }} >500 ribu - 750 ribu</option>
                                    <option value="3" {{ old('penghasilan_pertama') == '3' ? 'selected' : '' }} >750 ribu - 1 juta</option>
                                    <option value="4" {{ old('penghasilan_pertama') == '4' ? 'selected' : '' }} >1 juta - 1.5 juta</option>
                                    <option value="5" {{ old('penghasilan_pertama') == '5' ? 'selected' : '' }} >1.5 juta - 2.5 juta</option>
                                    <option value="6" {{ old('penghasilan_pertama') == '6' ? 'selected' : '' }} >2.5 juta keatas</option>
                                </select>                                
                            </div>
                            <div class="flex flex-col justify-between">
                                <label class="block mb-2 text-sm font-medium text-gray-900">Penghasilan yang saudara terima sekarang rata rata perbulan</label>
                                <select name="penghasilan_rata" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                                    <option value="1" {{ old('penghasilan_rata') == '1' ? 'selected' : '' }} >< 500 ribu</option>
                                    <option value="2" {{ old('penghasilan_rata') == '2' ? 'selected' : '' }} >500 ribu - 750 ribu</option>
                                    <option value="3" {{ old('penghasilan_rata') == '3' ? 'selected' : '' }} >750 ribu - 1 juta</option>
                                    <option value="4" {{ old('penghasilan_rata') == '4' ? 'selected' : '' }} >1 juta - 1.5 juta</option>
                                    <option value="5" {{ old('penghasilan_rata') == '5' ? 'selected' : '' }} >1.5 juta - 2.5 juta</option>
                                    <option value="6" {{ old('penghasilan_rata') == '6' ? 'selected' : '' }} >2.5 juta keatas</option>
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
                                    <option value="1" {{ old('kategori_lembaga') == '1' ? 'selected' : '' }} >Negeri</option>
                                    <option value="2" {{ old('kategori_lembaga') == '2' ? 'selected' : '' }} >Swasta</option>
                                </select>                             
                            </div>
                            <div class="flex flex-col justify-between">
                                <label class="block mb-2 text-sm font-medium text-gray-900">Status saudara saat ini</label>
                                <select name="status" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                                    <option value="1" {{ old('status') == '1' ? 'selected' : '' }} >PNS (guru) Depag</option>
                                    <option value="2" {{ old('status') == '2' ? 'selected' : '' }} >PNS (guru) Diknas</option>
                                    <option value="3" {{ old('status') == '3' ? 'selected' : '' }} >PNS Instansi lainnya</option>
                                    <option value="4" {{ old('status') == '4' ? 'selected' : '' }} >Guru swasta</option>
                                    <option value="5" {{ old('status') == '5' ? 'selected' : '' }} >Pegawai Swasta (Disekolag/Depag/Diknas)</option>
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
                                    <option value="1" {{ old('interaksi_pimpinan') == '1' ? 'selected' : '' }} >Sangat Memuaskan</option>
                                    <option value="2" {{ old('interaksi_pimpinan') == '2' ? 'selected' : '' }} >Memuaskan</option>
                                    <option value="3" {{ old('interaksi_pimpinan') == '3' ? 'selected' : '' }} >Tidak ada pendapat</option>
                                    <option value="4" {{ old('interaksi_pimpinan') == '4' ? 'selected' : '' }} >Tidak memuaskan</option>
                                    <option value="5" {{ old('interaksi_pimpinan') == '5' ? 'selected' : '' }} >Sangat tidak memuaskan</option>
                                </select>                              
                            </div>
                            <div class="flex flex-col justify-between">
                                <label class="block mb-2 text-sm font-medium text-gray-900">Selama saudara mendapatkan pendidikan di Program Studi di ULB, bagaimana pengalaman saudara tentang pelayanan kemahasiswaan</label>
                                <select name="layanan_kemahasiswaan" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                                    <option value="1" {{ old('layanan_kemahasiswaan') == '1' ? 'selected' : '' }} >Sangat Memuaskan</option>
                                    <option value="2" {{ old('layanan_kemahasiswaan') == '2' ? 'selected' : '' }} >Memuaskan</option>
                                    <option value="3" {{ old('layanan_kemahasiswaan') == '3' ? 'selected' : '' }} >Tidak ada pendapat</option>
                                    <option value="4" {{ old('layanan_kemahasiswaan') == '4' ? 'selected' : '' }} >Tidak memuaskan</option>
                                    <option value="5" {{ old('layanan_kemahasiswaan') == '5' ? 'selected' : '' }} >Sangat tidak memuaskan</option>
                                </select>                               
                            </div>
                            <div class="flex flex-col justify-between">
                                <label class="block mb-2 text-sm font-medium text-gray-900">Informasi Keberadaan Teman ( 5 Orang )</label>
                                <input name="info_teman" type="text" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" required>
                            </div>
                            <div class="flex flex-col justify-between">
                                <label class="block mb-2 text-sm font-medium text-gray-900">Kesediaan saudara sebagai alumni untuk ikut membesarkan nama kampus ULB dalam meningkatkan daya saing lulusan Program Studi di kampus ULB</label>
                                <select name="kesiapan_saudara" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                                    <option value="1" {{ old('kesiapan_saudara') == '1' ? 'selected' : '' }} >Sebagai Donatur tetap</option>
                                    <option value="2" {{ old('kesiapan_saudara') == '2' ? 'selected' : '' }} >Menyumbang sekali ini saja</option>
                                    <option value="3" {{ old('kesiapan_saudara') == '3' ? 'selected' : '' }} >Menyumbang fasilitas prasarana kampus</option>
                                    <option value="4" {{ old('kesiapan_saudara') == '4' ? 'selected' : '' }} >Saya akan memberikan/ membantu mencari bantuan</option>
                                </select>                               
                            </div>
                            <div class="flex flex-col justify-between">
                                <label class="block mb-2 text-sm font-medium text-gray-900">Dalam pengembangan jejaring</label>
                                <select name="jejaring" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                                    <option value="1" {{ old('jejaring') == '1' ? 'selected' : '' }} >Saya akan serius untuk menangani ikatan alumni</option>
                                    <option value="2" {{ old('jejaring') == '2' ? 'selected' : '' }} >Saya akan membantu menyediakan bursa kerja bagi alumni yang belum kerja</option>
                                    <option value="3" {{ old('jejaring') == '3' ? 'selected' : '' }} >Saya akan memberikan akses untuk memperoleh beasiswa kerjasama penelitian dan pengabdian masyarakat</option>
                                    <option value="4" {{ old('jejaring') == '4' ? 'selected' : '' }} >Lainnya</option>
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