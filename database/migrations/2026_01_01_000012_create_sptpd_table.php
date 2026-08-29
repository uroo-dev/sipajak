<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('sptpd', function (Blueprint $table) {
            $table->id();
            $table->foreignId('objek_pajak_id')->constrained('objek_pajak');
            $table->foreignId('masa_pajak_id')->constrained('masa_pajak');
            $table->foreignId('tarif_pajak_id')->constrained('tarif_pajak');
            $table->date('tanggal_lapor');
            $table->decimal('dasar_pengenaan_pajak', 15, 2)->comment('nilai utama, mis. omzet');
            $table->decimal('jumlah_pajak_terutang', 15, 2);
            $table->string('status')->comment('enum: draft, disubmit, diverifikasi, ditetapkan')->default('draft');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('sptpd');
    }
};
