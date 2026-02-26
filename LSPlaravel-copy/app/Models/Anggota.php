<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Anggota extends Model
{
    protected $table = 'anggota'; // ⬅️ INI KUNCI
    protected $primaryKey = 'id_anggota';
    public $timestamps = false;

    protected $fillable = [
        'nis',
        'nama_anggota',
        'kelas',
        'jurusan',
        'username',
        'password'
    ];
}
