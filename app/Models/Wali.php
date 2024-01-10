<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Wali extends Model
{
    use HasFactory;
    protected $fillable = [
        'id_user',
        'nama_wali',
        'hubungan',
        'kontak',
        'pekerjaan',
        'alamat',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
