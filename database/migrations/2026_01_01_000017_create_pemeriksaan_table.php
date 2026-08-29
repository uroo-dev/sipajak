<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('pemeriksaan', function (Blueprint $table) {
            $table->id();
            $table->foreignId('sptpd_id')->constrained('sptpd');
            $table->foreignId('petugas_id')->constrained('users');
            $table->date('tanggal_mulai_periksa');
            $table->date('tanggal_selesai_periksa')->nullable();
            $table->text('hasil_temuan')->nullable();
            $table->string('status')->comment('enum: dijadwalkan, dalam_proses, selesai')->default('dijadwalkan');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('pemeriksaan');
    }
};
