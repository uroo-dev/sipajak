<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Skpd extends Model
{
    use HasFactory;

    protected $table = 'skpd';

    protected $fillable = [
        'sptpd_id',
        'pemeriksaan_id',
        'jenis_skpd',
        'nomor_skpd',
        'jumlah_ketetapan',
        'selisih',
        'status_approval',
        'disetujui_oleh',
        'tanggal_terbit',
        'path_file_pdf',
        'qr_code',
    ];

    protected $casts = [
        'jumlah_ketetapan' => 'float',
        'selisih' => 'float',
        'tanggal_terbit' => 'date',
    ];

    public function sptpd(): BelongsTo
    {
        return $this->belongsTo(Sptpd::class, 'sptpd_id');
    }

    public function pemeriksaan(): BelongsTo
    {
        return $this->belongsTo(Pemeriksaan::class, 'pemeriksaan_id');
    }

    public function approver(): BelongsTo
    {
        return $this->belongsTo(User::class, 'disetujui_oleh');
    }
}
