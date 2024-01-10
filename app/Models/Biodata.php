<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Biodata extends Model
{
    use HasFactory;
    protected $fillable = [
        'id_user',
        'nik',
        'nama_lengkap',
        'jenis_kelamin',
        'tempat_lahir',
        'tanggal_lahir',
        'agama',
        'no_telepon',
        'email',
        'status',
        'alamat',
        'provinsi',
        'kota',
        'kecamatan',
        'kelurahan',
        'dusun',
        'rt_rw',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
