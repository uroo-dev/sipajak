<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class JenisPajak extends Model
{
    use HasFactory;

    protected $table = 'jenis_pajak';

    protected $fillable = [
        'kode_jenis_pajak',
        'nama_jenis_pajak',
        'deskripsi',
        'dasar_pengenaan',
        'status_aktif',
    ];

    protected $casts = [
        'status_aktif' => 'boolean',
    ];

    public function kategoriObjekPajak(): HasMany
    {
        return $this->hasMany(KategoriObjekPajak::class, 'jenis_pajak_id');
    }

    public function tarifPajak(): HasMany
    {
        return $this->hasMany(TarifPajak::class, 'jenis_pajak_id');
    }

    public function komponenFormulir(): HasMany
    {
        return $this->hasMany(KomponenFormulir::class, 'jenis_pajak_id');
    }

    public function masaPajak(): HasMany
    {
        return $this->hasMany(MasaPajak::class, 'jenis_pajak_id');
    }

    public function objekPajak(): HasMany
    {
        return $this->hasMany(ObjekPajak::class, 'jenis_pajak_id');
    }
}
