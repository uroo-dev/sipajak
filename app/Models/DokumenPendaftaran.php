<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class DokumenPendaftaran extends Model
{
    use HasFactory;

    protected $table = 'dokumen_pendaftaran';

    protected $fillable = [
        'objek_pajak_id',
        'jenis_dokumen',
        'path_file',
    ];

    public function objekPajak(): BelongsTo
    {
        return $this->belongsTo(ObjekPajak::class, 'objek_pajak_id');
    }
}
