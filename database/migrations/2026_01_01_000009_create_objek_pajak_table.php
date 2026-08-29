<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('objek_pajak', function (Blueprint $table) {
            $table->id();
            $table->foreignId('wajib_pajak_id')->constrained('wajib_pajak')->cascadeOnDelete();
            $table->foreignId('jenis_pajak_id')->constrained('jenis_pajak');
            $table->foreignId('kategori_objek_pajak_id')->nullable()->constrained('kategori_objek_pajak');
            $table->foreignId('wilayah_id')->constrained('wilayah');
            $table->string('nama_objek_usaha');
            $table->text('alamat_objek');
            $table->string('nomor_npwpd')->unique();
            $table->date('tanggal_terbit_npwpd')->nullable();
            $table->string('qr_code_npwpd')->nullable();
            $table->string('status_registrasi')->comment('enum: diajukan, disetujui, ditolak')->default('diajukan');
            $table->foreignId('diverifikasi_oleh')->nullable()->constrained('users')->nullOnDelete();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('objek_pajak');
    }
};
