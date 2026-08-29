<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $table = 'users';

    protected $fillable = [
        'role_id',
        'nama',
        'email',
        'password',
        'no_telp',
        'status_aktif',
    ];

    protected $hidden = [
        'password',
    ];

    protected $casts = [
        'status_aktif' => 'boolean',
        'password' => 'hashed',
    ];

    public function role(): BelongsTo
    {
        return $this->belongsTo(Role::class, 'role_id');
    }

    public function objekPajakVerifikasi(): HasMany
    {
        return $this->hasMany(ObjekPajak::class, 'diverifikasi_oleh');
    }

    public function pemeriksaan(): HasMany
    {
        return $this->hasMany(Pemeriksaan::class, 'petugas_id');
    }

    public function skpdDisetujui(): HasMany
    {
        return $this->hasMany(Skpd::class, 'disetujui_oleh');
    }

    public function notifikasi(): HasMany
    {
        return $this->hasMany(Notifikasi::class, 'user_id');
    }

    public function logAktivitas(): HasMany
    {
        return $this->hasMany(LogAktivitas::class, 'user_id');
    }
}
