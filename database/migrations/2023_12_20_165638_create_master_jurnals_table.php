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
        Schema::create('master_jurnals', function (Blueprint $table) {
            $table->id();
            $table->string('nomor_transaksi');
            $table->string('tanggal_transaksi');
            $table->unsignedBigInteger('dokumen');
            $table->string('rekening')->nullable();
            $table->string('uraian')->nullable();
            $table->string('keterangan')->nullable();
            $table->unsignedBigInteger('jenis_mata_uang');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('master_jurnals');
    }
};
