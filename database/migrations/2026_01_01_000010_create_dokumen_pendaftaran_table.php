<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('dokumen_pendaftaran', function (Blueprint $table) {
            $table->id();
            $table->foreignId('objek_pajak_id')->constrained('objek_pajak')->cascadeOnDelete();
            $table->string('jenis_dokumen')->comment('enum: ktp, npwp, izin_usaha, foto_lokasi, lainnya');
            $table->string('path_file');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('dokumen_pendaftaran');
    }
};
