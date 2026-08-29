<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class TarifPajak extends Model
{
    use HasFactory;

    protected $table = 'tarif_pajak';

    protected $fillable = [
        'jenis_pajak_id',
        'kategori_objek_pajak_id',
        'persentase_tarif',
        'berlaku_mulai',
        'berlaku_sampai',
        'keterangan',
    ];

    protected $casts = [
        'persentase_tarif' => 'float',
        'berlaku_mulai' => 'date',
        'berlaku_sampai' => 'date',
    ];

    public function jenisPajak(): BelongsTo
    {
        return $this->belongsTo(JenisPajak::class, 'jenis_pajak_id');
    }

    public function kategoriObjekPajak(): BelongsTo
    {
        return $this->belongsTo(KategoriObjekPajak::class, 'kategori_objek_pajak_id');
    }

    public function sptpd(): HasMany
    {
        return $this->hasMany(Sptpd::class, 'tarif_pajak_id');
    }
}
