<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('skpd', function (Blueprint $table) {
            $table->id();
            $table->foreignId('sptpd_id')->constrained('sptpd');
            $table->foreignId('pemeriksaan_id')->nullable()->constrained('pemeriksaan')->nullOnDelete();
            $table->string('jenis_skpd')->comment('enum: SKPD, SKPDKB, SKPDLB');
            $table->string('nomor_skpd')->unique();
            $table->decimal('jumlah_ketetapan', 15, 2);
            $table->decimal('selisih', 15, 2)->default(0);
            $table->string('status_approval')->comment('enum: menunggu, disetujui, ditolak')->default('menunggu');
            $table->foreignId('disetujui_oleh')->nullable()->constrained('users')->nullOnDelete();
            $table->date('tanggal_terbit');
            $table->string('path_file_pdf')->nullable();
            $table->string('qr_code')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('skpd');
    }
};
