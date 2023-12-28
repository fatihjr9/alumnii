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
            $table->text('nama');
            $table->text('npm');
            $table->text('alamat');
            $table->text('kontak');
            $table->text('email');
            $table->text('prodi');
            $table->date('thn_lulus');
            // Pekerjaan
            $table->text('tempat_kerja');
            $table->text('alamat_kerja');
            $table->text('kontak_kerja');
            $table->text('sesuai_minat');
            $table->text('info_kerja');
            $table->text('waktu_kerja');
            $table->text('alasan');
            $table->text('penghasilan_pertama');
            $table->text('penghasilan_rata');
            $table->text('riwayat_kerja');
            $table->text('nama_alamat_lembaga');
            $table->text('kategori_lembaga');
            $table->text('status');
            $table->text('pangkat');
            $table->text('jabaran');
            // lainnya
            $table->text('saran_prodi');
            $table->text('saran_himal');
            $table->text('saran_dosen');
            $table->text('interaksi_pimpinan');
            $table->text('layanan_kemahasiswaan');
            $table->text('info_teman');
            $table->text('kesiapan_saudara');
            $table->text('jejaring');
            $table->text('penyedia_fasilitas');
            $table->text('catatan_prodi');
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
