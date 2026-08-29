<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('tarif_pajak', function (Blueprint $table) {
            $table->id();
            $table->foreignId('jenis_pajak_id')->constrained('jenis_pajak')->cascadeOnDelete();
            $table->foreignId('kategori_objek_pajak_id')->nullable()->constrained('kategori_objek_pajak')->cascadeOnDelete();
            $table->decimal('persentase_tarif', 5, 2);
            $table->date('berlaku_mulai');
            $table->date('berlaku_sampai')->nullable();
            $table->text('keterangan')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('tarif_pajak');
    }
};
