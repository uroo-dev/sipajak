<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Relations\HasMany;

class WajibPajak extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $table = 'wajib_pajak';

    protected $fillable = [
        'nama_wajib_pajak',
        'nik',
        'npwp_pusat',
        'alamat',
        'no_telp',
        'email',
        'password',
        'status_aktif',
    ];

    protected $hidden = [
        'password',
    ];

    protected $casts = [
        'status_aktif' => 'boolean',
        'password' => 'hashed',
    ];

    public function objekPajak(): HasMany
    {
        return $this->hasMany(ObjekPajak::class, 'wajib_pajak_id');
    }

    public function notifikasi(): HasMany
    {
        return $this->hasMany(Notifikasi::class, 'wajib_pajak_id');
    }

    public function logAktivitas(): HasMany
    {
        return $this->hasMany(LogAktivitas::class, 'wajib_pajak_id');
    }
}
