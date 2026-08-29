<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class SptpdDetail extends Model
{
    use HasFactory;

    protected $table = 'sptpd_detail';

    protected $fillable = [
        'sptpd_id',
        'komponen_formulir_id',
        'nilai',
    ];

    public function sptpd(): BelongsTo
    {
        return $this->belongsTo(Sptpd::class, 'sptpd_id');
    }

    public function komponenFormulir(): BelongsTo
    {
        return $this->belongsTo(KomponenFormulir::class, 'komponen_formulir_id');
    }
}
