<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Notifikasi extends Model
{
    use HasFactory;

    protected $table = 'notifikasi';

    protected $fillable = [
        'wajib_pajak_id',
        'user_id',
        'judul',
        'pesan',
        'channel',
        'status_kirim',
        'dikirim_pada',
    ];

    protected $casts = [
        'dikirim_pada' => 'datetime',
    ];

    public function wajibPajak(): BelongsTo
    {
        return $this->belongsTo(WajibPajak::class, 'wajib_pajak_id');
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
