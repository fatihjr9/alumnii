<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Galeri extends Model
{
    use HasFactory;
    protected $fillable = ['judul_galeri', 'galeri'];

    public function setGaleriAttribute($value)
    {
        $this->attributes['galeri'] = json_encode($value);
    }
}
