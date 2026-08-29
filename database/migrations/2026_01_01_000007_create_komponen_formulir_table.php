<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('komponen_formulir', function (Blueprint $table) {
            $table->id();
            $table->foreignId('jenis_pajak_id')->constrained('jenis_pajak')->cascadeOnDelete();
            $table->string('label_field');
            $table->string('nama_field')->comment('key/slug field, dipakai sebagai identitas pada sptpd_detail');
            $table->string('tipe_data')->comment('enum: angka, teks, tanggal, pilihan');
            $table->text('opsi_pilihan')->nullable()->comment('JSON array opsi bila tipe_data = pilihan');
            $table->integer('urutan')->default(0);
            $table->boolean('wajib_diisi')->default(false);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('komponen_formulir');
    }
};
