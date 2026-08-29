<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('masa_pajak', function (Blueprint $table) {
            $table->id();
            $table->foreignId('jenis_pajak_id')->constrained('jenis_pajak');
            $table->integer('tahun');
            $table->string('periode')->comment('mis. "01" s.d. "12" untuk bulanan');
            $table->date('tanggal_mulai');
            $table->date('tanggal_jatuh_tempo');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('masa_pajak');
    }
};
