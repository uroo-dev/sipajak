<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('jenis_pajaks', function (Blueprint $table) {
            $table->id();
            $table->string('kode_jenis_pajak')->unique();
            $table->string('nama_jenis_pajak');
            $table->text('deskripsi')->nullable();
            $table->string('dasar_pengenaan');
            $table->enum('status_aktif',['Aktif', 'Tidak Aktif'])->default('Aktif');    
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jenis_pajaks');
    }
};
