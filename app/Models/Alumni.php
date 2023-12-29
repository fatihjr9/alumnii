<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Alumni extends Model
{
    protected $fillable = [
        'foto',
        'nama',
        'npm',
        'alamat',
        'kontak',
        'email',
        'prodi',
        'thn_lulus',
        // Pekerjaan
        'tempat_kerja',
        'alamat_kerja',
        'kontak_kerja',
        'sesuai_minat',
        'info_kerja',
        'waktu_kerja',
        'alasan',
        'penghasilan_pertama',
        'penghasilan_rata',
        'riwayat_kerja',
        'nama_alamat_lembaga',
        'kategori_lembaga',
        'status',
        'pangkat',
        'jabaran',
        // lainnya
        'saran_prodi',
        'saran_himal',
        'saran_dosen',
        'interaksi_pimpinan',
        'layanan_kemahasiswaan',
        'info_teman',
        'kesiapan_saudara',
        'jejaring',
        'penyedia_fasilitas',
        'catatan_prodi',
    ];
    use HasFactory;
}
