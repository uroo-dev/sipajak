<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('pembayaran', function (Blueprint $table) {
            $table->id();
            $table->foreignId('tagihan_pembayaran_id')->constrained('tagihan_pembayaran');
            $table->dateTime('tanggal_bayar');
            $table->decimal('jumlah_dibayar', 15, 2);
            $table->string('channel_pembayaran');
            $table->string('referensi_gateway')->nullable()->comment('transaction id dari Midtrans/Xendit');
            $table->string('status')->comment('enum: berhasil, gagal')->default('berhasil');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('pembayaran');
    }
};
