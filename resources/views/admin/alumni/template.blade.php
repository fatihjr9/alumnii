<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>Data {{ $alumni->nama }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
        <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.1/flowbite.min.css" rel="stylesheet" />

        <!-- Scripts -->
        {{-- @vite(['resources/css/app.css', 'resources/js/app.js']) --}}

        <!-- Styles -->
        @livewireStyles
    </head>
<body>
    <style>
        .template {
    margin-top: .5rem;
        }
        .template-header {
            display:flex;
            align-items: center;
            justify-content: center;
            border-bottom : 1px solid #c0c0c0;
            padding-bottom : .5rem;
        }
        .template-header img{
            border-radius: 100%;
            width: 5rem;
            height: 5rem;
        }
        .template-content-alumni {
            margin: 1rem;
            display: grid;
            grid-template-columns: 1fr;
            gap:.5rem;
        }
        .template-content-alumni p {
            font-size: 1rem;
            font-weight: 600;
        }
        .template-kerja {
            margin: 2rem;
            display: grid;
            grid-template-columns: 1fr 1fr 1fr 1fr;
            gap:1.5rem;
        }
        .position {
            border-bottom : 1px solid #c0c0c0;
            padding-bottom : .5rem;
        }
        .position h5 {
            font-size: 1rem;
            font-weight: 600;
            margin-bottom: .5rem;
        }
        .position p {
            font-size: 1rem;
            font-weight: 400;
            color: #666666;
        }
    </style>
    <div class="template">
        <div class="template-header">
            <img src="{{ asset('alumni/' . $alumni->foto) }}" alt="{{ $alumni->nama }}" class="rounded-t-md w-24 h-24 object-cover bg-center">
            <div class="template-content-alumni">
                <p>{{ $alumni->nama }}</p>
                <p>{{ $alumni->prodi }} - {{ $alumni->npm }}</p>
            </div>
        </div>
        <div class="template-kerja">
            <div class="position">
                <h5>Alamat</h5>
                <p>{{ $alumni->alamat }}</p>
            </div>
            <div class="position">
                <h5>Kontak</h5>
                <p>{{ $alumni->kontak }}</p>
            </div>
            <div class="position">
                <h5>Email</h5>
                <p>{{ $alumni->email }}</p>
            </div>
            <div class="position">
                <h5>Tahun Lulus</h5>
                <p>{{ $alumni->thn_lulus }}</p>
            </div>
            <div class="position">
                <h5>Tempat Kerja</h5>
                <p>{{ $alumni->tempat_kerja }}</p>
            </div>
            <div class="position">
                <h5>Alamat Tempat Kerja Sekarang</h5>
                <p>{{ $alumni->alamat_kerja }}</p>
            </div>
            <div class="position">
                <h5>Nomor Telepon Tempat Kerja Sekarang</h5>            
                <p>{{ $alumni->kontak_kerja }}</p>
            </div>
            <div class="position">
                <h5>Setelah Lulus, Saudara/Saudari langsung Bekerja dan tempat Bekerja saudara sesuai dengan ijazah ( pada lembaga pendidikan )?</h5>            
                <p>{{ $alumni->sesuai_minat }}</p>
            </div>
            <div class="position">
                <h5>Pada Saat mendapatkan pekerjaan pertama dari mana saudara mendapatkan informasi pekerjaan tersebut?</h5>            
                <p>{{ $alumni->info_kerja }}</p>
            </div>
            <div class="position">
                <h5>Lama waktu menunggu pekerjaan pertama ( opsional )</h5>            
                <p>{{ $alumni->waktu_kerja }}</p>
            </div>
            <div class="position">
                <h5>Penyebab harus menunggu pekerjaan pertama (opsional)</h5>            
                <p>{{ $alumni->alasan }}</p>
            </div>
            <div class="position">
                <h5>Penghasilan yang saudara terima perbulan pertama kali bekerja</h5>            
                <p>{{ $alumni->penghasilan_pertama }}</p>
            </div>
            <div class="position">
                <h5>Penghasilan yang saudara terima sekarang rata rata perbulan</h5>            
                <p>{{ $alumni->penghasilan_rata }}</p>
            </div>
            <div class="position">
                <h5>Riwayat Pekerjaan sejak lulus dari Universitas Labuhan Batu Rantauprapat Sumatera Utara hingga mendapat pekerjaan Saat ini</h5>            
                <p>{{ $alumni->riwayat_kerja }}</p>
            </div>
            <div class="position">
                <h5>Nama dan alamat lembaga pendidikan tempat saudara bekerja sekarang</h5>            
                <p>{{ $alumni->nama_alamat_lembaga }}</p>
            </div>
            <div class="position">
                <h5>Bentuk lembaga pendidikan tempat saudara bekerja</h5>            
                <p>{{ $alumni->kategori_lembaga }}</p>
            </div>
            <div class="position">
                <h5>Status saudara saat ini</h5>            
                <p>{{ $alumni->status }}</p>
            </div>
            <div class="position">
                <h5>Pangkat dan golongan saat ini ( opsional )</h5>            
                <p>{{ $alumni->pangkat }}</p>
            </div>
            <div class="position">
                <h5>Jabatan pekerjaan saat ini ( opsional )</h5>            
                <p>{{ $alumni->jabaran }}</p>
            </div>
            <div class="position">
                <h5>Berikan saran Kepada program studi di ULB tentang peningkatan kegiatan program studi</h5>            
                <p>{{ $alumni->saran_prodi }}</p>
            </div>
            <div class="position">
                <h5>Berikan saran kepada program studi di ULB tentang himpunan alumni</h5>            
                <p>{{ $alumni->saran_himal }}</p>
            </div>
            <div class="position">
                <h5>Berikan saran kepada program studi di ULB tentang temu dosen-mahasiswa-alumni</h5>            
                <p>{{ $alumni->saran_dosen }}</p>
            </div>
            <div class="position">
                <h5>Selama saudara mendapatkan pendidikan di Program Studi di ULB, bagaimana pengalaman saudara berinteraksi dengan Pimpinan ULB</h5>            
                <p>{{ $alumni->interaksi_pimpinan }}</p>
            </div>
            <div class="position">
                <h5>Selama saudara mendapatkan pendidikan di Program Studi di ULB, bagaimana pengalaman saudara tentang pelayanan kemahasiswaan</h5>            
                <p>{{ $alumni->layanan_kemahasiswaan }}</p>
            </div>
            <div class="position">
                <h5>Informasi Keberadaan Teman ( 5 Orang )</h5>            
                <p>{{ $alumni->info_teman }}</p>
            </div>
            <div class="position">
                <h5>Kesediaan saudara sebagai alumni untuk ikut membesarkan nama kampus ULB dalam meningkatkan daya saing lulusan Program Studi di kampus ULB</h5>            
                <p>{{ $alumni->kesiapan_saudara }}</p>
            </div>
            <div class="position">
                <h5>Dalam pengembangan jejaring</h5>            
                <p>{{ $alumni->jejaring }}</p>
            </div>
            <div class="position">
                <h5>Penyediaan fasilitas untuk kegiatan akademik</h5>            
                <p>{{ $alumni->penyedia_fasilitas }}</p>
            </div>
            <div class="position">
                <h5>Berikan catatan khusus untuk pengembangan program studi</h5>            
                <p>{{ $alumni->catatan_prodi }}</p>
            </div>
        </div>
    </div>
</body>
</html>