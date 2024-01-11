<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('alumnis', function (Blueprint $table) {
            $table->id();
            $table->string('foto');
            $table->string('nama');
            $table->string('npm');
            $table->string('alamat');
            $table->string('kontak');
            $table->string('email');
            $table->string('prodi');
            $table->date('thn_lulus');
            // Pekerjaan
            $table->string('tempat_kerja');
            $table->string('alamat_kerja');
            $table->string('kontak_kerja');
            $table->string('sesuai_minat');
            $table->string('info_kerja');
            $table->string('waktu_kerja');
            $table->text('alasan');
            $table->string('penghasilan_pertama');
            $table->string('penghasilan_rata');
            $table->text('riwayat_kerja');
            $table->string('nama_alamat_lembaga');
            $table->string('kategori_lembaga');
            $table->string('status');
            $table->string('pangkat');
            $table->string('jabaran');
            // lainnya
            $table->string('saran_prodi');
            $table->string('saran_himal');
            $table->string('saran_dosen');
            $table->string('interaksi_pimpinan');
            $table->string('layanan_kemahasiswaan');
            $table->string('info_teman');
            $table->string('kesiapan_saudara');
            $table->string('jejaring');
            $table->string('penyedia_fasilitas');
            $table->string('catatan_prodi');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('alumnis');
    }
};
