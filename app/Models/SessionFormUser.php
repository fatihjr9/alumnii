<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SessionFormUser extends Model
{
    use HasFactory;
    protected $fillable = ['user_id', 'alumni_id'];

    public function alumni()
    {
        return $this->belongsTo(Alumni::class);
    }
}
