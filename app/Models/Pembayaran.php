<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Pembayaran extends Model
{
    use HasFactory;

    protected $table = 'pembayaran';

    protected $fillable = [
        'tagihan_pembayaran_id',
        'tanggal_bayar',
        'jumlah_dibayar',
        'channel_pembayaran',
        'referensi_gateway',
        'status',
    ];

    protected $casts = [
        'tanggal_bayar' => 'datetime',
        'jumlah_dibayar' => 'float',
    ];

    public function tagihanPembayaran(): BelongsTo
    {
        return $this->belongsTo(TagihanPembayaran::class, 'tagihan_pembayaran_id');
    }

    public function sspd(): HasOne
    {
        return $this->hasOne(Sspd::class, 'pembayaran_id');
    }
}
