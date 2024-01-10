<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jurusan extends Model
{
    use HasFactory;
    protected $fillable = [
        'id_user',
        'fakultas',
        'prodi',
        'reason',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
