<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('wajib_pajak', function (Blueprint $table) {
            $table->id();
            $table->string('nama_wajib_pajak');
            $table->string('nik')->nullable();
            $table->string('npwp_pusat')->nullable();
            $table->text('alamat');
            $table->string('no_telp');
            $table->string('email')->unique();
            $table->string('password');
            $table->boolean('status_aktif')->default(true);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('wajib_pajak');
    }
};
