<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Alumni extends Model
{
    protected $fillable = ['foto','nama','npm', 'prodi', 'thn_masuk', 'thn_lulus'];
    use HasFactory;
}
