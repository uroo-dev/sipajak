<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Sspd extends Model
{
    use HasFactory;

    protected $table = 'sspd';

    protected $fillable = [
        'pembayaran_id',
        'nomor_sspd',
        'tanggal_terbit',
        'path_file_pdf',
        'qr_code',
    ];

    protected $casts = [
        'tanggal_terbit' => 'date',
    ];

    public function pembayaran(): BelongsTo
    {
        return $this->belongsTo(Pembayaran::class, 'pembayaran_id');
    }
}
