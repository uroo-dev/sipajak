<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('sspd', function (Blueprint $table) {
            $table->id();
            $table->foreignId('pembayaran_id')->unique()->constrained('pembayaran')->cascadeOnDelete();
            $table->string('nomor_sspd')->unique();
            $table->date('tanggal_terbit');
            $table->string('path_file_pdf')->nullable();
            $table->string('qr_code')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('sspd');
    }
};
