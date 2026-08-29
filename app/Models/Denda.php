<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Denda extends Model
{
    use HasFactory;

    protected $table = 'denda';

    protected $fillable = [
        'sptpd_id',
        'jenis_denda',
        'jumlah_denda',
        'tanggal_dikenakan',
    ];

    protected $casts = [
        'jumlah_denda' => 'float',
        'tanggal_dikenakan' => 'date',
    ];

    public function sptpd(): BelongsTo
    {
        return $this->belongsTo(Sptpd::class, 'sptpd_id');
    }
}
