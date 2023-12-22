<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Berita extends Model
{
    protected $fillable = ['gambar','nama', 'tanggal', 'deskripsi'];
    use HasFactory;
}
