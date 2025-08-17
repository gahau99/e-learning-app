<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kelas extends Model
{
    use HasFactory;

    protected $table = 'kelas'; // nama tabel

    protected $fillable = [
        'user_id',
        'nama',
        'deskripsi',
        'kode_kelas',
        'thumbnail',
    ];

    // 🔹 Relasi ke guru (pembuat kelas)
    public function guru()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    // 🔹 Relasi ke siswa (many-to-many via kelas_user)
    public function siswa()
    {
        return $this->belongsToMany(User::class, 'kelas_user');
    }

    // 🔹 Relasi ke materi
    public function materi()
    {
        return $this->hasMany(Materi::class);
    }

    // 🔹 Relasi ke tugas
    public function tugas()
    {
        return $this->hasMany(Tugas::class);
    }
}
