<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('tagihan_pembayaran', function (Blueprint $table) {
            $table->id();
            $table->foreignId('sptpd_id')->constrained('sptpd')->cascadeOnDelete();
            $table->string('kode_billing')->unique();
            $table->decimal('jumlah_tagihan', 15, 2);
            $table->string('metode_pembayaran')->comment('enum: virtual_account, qris, e_wallet');
            $table->string('status')->comment('enum: menunggu, lunas, kedaluwarsa, dibatalkan')->default('menunggu');
            $table->dateTime('kedaluwarsa_pada');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('tagihan_pembayaran');
    }
};
