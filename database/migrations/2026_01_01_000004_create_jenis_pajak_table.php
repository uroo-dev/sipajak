<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('jenis_pajak', function (Blueprint $table) {
            $table->id();
            $table->string('kode_jenis_pajak')->unique();
            $table->string('nama_jenis_pajak');
            $table->text('deskripsi')->nullable();
            $table->string('dasar_pengenaan')->comment('label basis pengenaan utama, mis. "Omzet", "Luas Media"');
            $table->boolean('status_aktif')->default(true);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('jenis_pajak');
    }
};
