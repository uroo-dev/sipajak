<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class MasaPajak extends Model
{
    use HasFactory;

    protected $table = 'masa_pajak';

    protected $fillable = [
        'jenis_pajak_id',
        'tahun',
        'periode',
        'tanggal_mulai',
        'tanggal_jatuh_tempo',
    ];

    protected $casts = [
        'tanggal_mulai' => 'date',
        'tanggal_jatuh_tempo' => 'date',
    ];

    public function jenisPajak(): BelongsTo
    {
        return $this->belongsTo(JenisPajak::class, 'jenis_pajak_id');
    }

    public function sptpd(): HasMany
    {
        return $this->hasMany(Sptpd::class, 'masa_pajak_id');
    }
}
