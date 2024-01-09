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
        @vite(['resources/css/app.css', 'resources/js/app.js'])

        <!-- Styles -->
        @livewireStyles
    </head>
<body>
    <div class="template">
        <div class="template-header">
            <img src="{{ asset('alumni/' . $alumni->foto) }}" alt="{{ $alumni->nama }}" class="rounded-t-md w-24 h-24 object-cover bg-center">
            <div class="template-header-text">
                <h5>{{ $alumni->nama }}</h5>
                <p>{{ $alumni->prodi }} - {{ $alumni->npm }}</p>
                <p>{{ $alumni->alamat }}</p>
                <p>NPM :{{ $alumni->kontak }}</p>
            </div>
        </div>
        <div class="template-content-alumni">
            <h5>{{ $alumni->email }}</h5>
            <h5>{{ $alumni->thn_lulus }}</h5>
        </div>
        <h5>{{ $alumni->tempat_kerja }}</h5>
        <h5>{{ $alumni->alamat_kerja }}</h5>
        <h5>{{ $alumni->kontak_kerja }}</h5>
        <h5>{{ $alumni->sesuai_minat }}</h5>
        <h5>{{ $alumni->info_kerja }}</h5>
        <h5>{{ $alumni->waktu_kerja }}</h5>
        <h5>{{ $alumni->alasan }}</h5>
        <h5>{{ $alumni->penghasilan_pertama }}</h5>
        <h5>{{ $alumni->penghasilan_rata }}</h5>
        <h5>{{ $alumni->riwayat_kerja }}</h5>
        <h5>{{ $alumni->nama_alamat_lembaga }}</h5>
        <h5>{{ $alumni->kategori_lembaga }}</h5>
        <h5>{{ $alumni->status }}</h5>
        <h5>{{ $alumni->pangkat }}</h5>
        <h5>{{ $alumni->saran_prodi }}</h5>
        <h5>{{ $alumni->saran_himal }}</h5>
        <h5>{{ $alumni->saran_dosen }}</h5>
        <h5>{{ $alumni->interaksi_pimpinan }}</h5>
        <h5>{{ $alumni->layanan_kemahasiswaan }}</h5>
        <h5>{{ $alumni->info_teman }}</h5>
        <h5>{{ $alumni->kesiapan_saudara }}</h5>
        <h5>{{ $alumni->jejaring }}</h5>
        <h5>{{ $alumni->penyedia_fasilitas }}</h5>
        <h5>{{ $alumni->catatan_prodi }}</h5>
    </div>
</body>
</html>