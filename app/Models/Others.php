<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Others extends Model
{
    use HasFactory;
    protected $fillable = [
        'id_user',
        'organisasi',
        'jabatan_organisasi',
        'hobi',
        'prestasi',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
