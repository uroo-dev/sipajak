<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class ObjekPajak extends Model
{
    use HasFactory;

    protected $table = 'objek_pajak';

    protected $fillable = [
        'wajib_pajak_id',
        'jenis_pajak_id',
        'kategori_objek_pajak_id',
        'wilayah_id',
        'nama_objek_usaha',
        'alamat_objek',
        'nomor_npwpd',
        'tanggal_terbit_npwpd',
        'qr_code_npwpd',
        'status_registrasi',
        'diverifikasi_oleh',
    ];

    protected $casts = [
        'tanggal_terbit_npwpd' => 'date',
    ];

    public function wajibPajak(): BelongsTo
    {
        return $this->belongsTo(WajibPajak::class, 'wajib_pajak_id');
    }

    public function jenisPajak(): BelongsTo
    {
        return $this->belongsTo(JenisPajak::class, 'jenis_pajak_id');
    }

    public function kategoriObjekPajak(): BelongsTo
    {
        return $this->belongsTo(KategoriObjekPajak::class, 'kategori_objek_pajak_id');
    }

    public function wilayah(): BelongsTo
    {
        return $this->belongsTo(Wilayah::class, 'wilayah_id');
    }

    public function verifikator(): BelongsTo
    {
        return $this->belongsTo(User::class, 'diverifikasi_oleh');
    }

    public function dokumenPendaftaran(): HasMany
    {
        return $this->hasMany(DokumenPendaftaran::class, 'objek_pajak_id');
    }

    public function sptpd(): HasMany
    {
        return $this->hasMany(Sptpd::class, 'objek_pajak_id');
    }
}
