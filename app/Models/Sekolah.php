<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sekolah extends Model
{
    use HasFactory;
    protected $fillable = [
        'id_user',
        'nama_sekolah',
        'nisn',
        'tahun_lulus',
        'no_ijazah',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
