<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('kategori_objek_pajak', function (Blueprint $table) {
            $table->id();
            $table->foreignId('jenis_pajak_id')->constrained('jenis_pajak')->cascadeOnDelete();
            $table->string('nama_kategori');
            $table->text('deskripsi')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('kategori_objek_pajak');
    }
};
