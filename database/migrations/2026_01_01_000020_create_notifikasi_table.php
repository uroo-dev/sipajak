<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('notifikasi', function (Blueprint $table) {
            $table->id();
            $table->foreignId('wajib_pajak_id')->nullable()->constrained('wajib_pajak')->cascadeOnDelete();
            $table->foreignId('user_id')->nullable()->constrained('users')->cascadeOnDelete();
            $table->string('judul');
            $table->text('pesan');
            $table->string('channel')->comment('enum: email, whatsapp, sistem');
            $table->string('status_kirim')->comment('enum: terkirim, gagal, tertunda')->default('tertunda');
            $table->dateTime('dikirim_pada')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('notifikasi');
    }
};
