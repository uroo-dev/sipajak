<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('denda', function (Blueprint $table) {
            $table->id();
            $table->foreignId('sptpd_id')->constrained('sptpd');
            $table->string('jenis_denda')->comment('enum: terlambat_lapor, terlambat_bayar, kurang_bayar');
            $table->decimal('jumlah_denda', 15, 2);
            $table->date('tanggal_dikenakan');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('denda');
    }
};
