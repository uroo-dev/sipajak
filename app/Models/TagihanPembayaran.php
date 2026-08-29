<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class TagihanPembayaran extends Model
{
    use HasFactory;

    protected $table = 'tagihan_pembayaran';

    protected $fillable = [
        'sptpd_id',
        'kode_billing',
        'jumlah_tagihan',
        'metode_pembayaran',
        'status',
        'kedaluwarsa_pada',
    ];

    protected $casts = [
        'jumlah_tagihan' => 'float',
        'kedaluwarsa_pada' => 'datetime',
    ];

    public function sptpd(): BelongsTo
    {
        return $this->belongsTo(Sptpd::class, 'sptpd_id');
    }

    public function pembayaran(): HasMany
    {
        return $this->hasMany(Pembayaran::class, 'tagihan_pembayaran_id');
    }
}
