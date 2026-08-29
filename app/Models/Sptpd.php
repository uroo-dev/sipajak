<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Sptpd extends Model
{
    use HasFactory;

    protected $table = 'sptpd';

    protected $fillable = [
        'objek_pajak_id',
        'masa_pajak_id',
        'tarif_pajak_id',
        'tanggal_lapor',
        'dasar_pengenaan_pajak',
        'jumlah_pajak_terutang',
        'status',
    ];

    protected $casts = [
        'tanggal_lapor' => 'date',
        'dasar_pengenaan_pajak' => 'float',
        'jumlah_pajak_terutang' => 'float',
    ];

    public function objekPajak(): BelongsTo
    {
        return $this->belongsTo(ObjekPajak::class, 'objek_pajak_id');
    }

    public function masaPajak(): BelongsTo
    {
        return $this->belongsTo(MasaPajak::class, 'masa_pajak_id');
    }

    public function tarifPajak(): BelongsTo
    {
        return $this->belongsTo(TarifPajak::class, 'tarif_pajak_id');
    }

    public function details(): HasMany
    {
        return $this->hasMany(SptpdDetail::class, 'sptpd_id');
    }

    public function tagihanPembayaran(): HasMany
    {
        return $this->hasMany(TagihanPembayaran::class, 'sptpd_id');
    }

    public function pemeriksaan(): HasMany
    {
        return $this->hasMany(Pemeriksaan::class, 'sptpd_id');
    }

    public function skpd(): HasMany
    {
        return $this->hasMany(Skpd::class, 'sptpd_id');
    }

    public function denda(): HasMany
    {
        return $this->hasMany(Denda::class, 'sptpd_id');
    }
}
