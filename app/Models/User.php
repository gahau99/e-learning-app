<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

// 🔹 Kelas yang dibuat oleh user (guru)
public function kelasDibuat()
{
    return $this->hasMany(Kelas::class);
}

// 🔹 Kelas yang diikuti oleh user (siswa)
public function kelasDiikuti()
{
    return $this->belongsToMany(Kelas::class, 'kelas_user');
}

// 🔹 Tugas yang dikumpulkan oleh user (siswa)
public function pengumpulanTugas()
{
    return $this->hasMany(PengumpulanTugas::class);
}

public function komentars()
{
    return $this->hasMany(Komentar::class);
}

}
