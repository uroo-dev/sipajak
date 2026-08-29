<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Pemeriksaan extends Model
{
    use HasFactory;

    protected $table = 'pemeriksaan';

    protected $fillable = [
        'sptpd_id',
        'petugas_id',
        'tanggal_mulai_periksa',
        'tanggal_selesai_periksa',
        'hasil_temuan',
        'status',
    ];

    protected $casts = [
        'tanggal_mulai_periksa' => 'date',
        'tanggal_selesai_periksa' => 'date',
    ];

    public function sptpd(): BelongsTo
    {
        return $this->belongsTo(Sptpd::class, 'sptpd_id');
    }

    public function petugas(): BelongsTo
    {
        return $this->belongsTo(User::class, 'petugas_id');
    }

    public function skpd(): HasMany
    {
        return $this->hasMany(Skpd::class, 'pemeriksaan_id');
    }
}
