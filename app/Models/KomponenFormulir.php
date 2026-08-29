<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class KomponenFormulir extends Model
{
    use HasFactory;

    protected $table = 'komponen_formulir';

    protected $fillable = [
        'jenis_pajak_id',
        'label_field',
        'nama_field',
        'tipe_data',
        'opsi_pilihan',
        'urutan',
        'wajib_diisi',
    ];

    protected $casts = [
        'wajib_diisi' => 'boolean',
        'opsi_pilihan' => 'array',
    ];

    public function jenisPajak(): BelongsTo
    {
        return $this->belongsTo(JenisPajak::class, 'jenis_pajak_id');
    }

    public function sptpdDetails(): HasMany
    {
        return $this->hasMany(SptpdDetail::class, 'komponen_formulir_id');
    }
}
