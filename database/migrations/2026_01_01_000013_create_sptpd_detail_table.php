<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('sptpd_detail', function (Blueprint $table) {
            $table->id();
            $table->foreignId('sptpd_id')->constrained('sptpd')->cascadeOnDelete();
            $table->foreignId('komponen_formulir_id')->constrained('komponen_formulir');
            $table->text('nilai')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('sptpd_detail');
    }
};
