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
        Schema::create('jurnals_umum', function (Blueprint $table) {
            $table->id();
            $table->string('nomor_transaksi');
            $table->date('tanggal_transaksi');
            $table->string('dokumen');
            // $table->unsignedBigInteger('bank_id');
            $table->integer('sumber_data')->nullable();
            $table->string('uraian')->nullable();
            $table->string('debet')->nullable();
            $table->string('kredit')->nullable();
            // $table->string('tipe')->default(0);
            $table->string('keterangan_jurnal_umum')->nullable()->default('-');
            $table->unsignedBigInteger('jenis_mata_uang')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jurnals_umum');
    }
};
