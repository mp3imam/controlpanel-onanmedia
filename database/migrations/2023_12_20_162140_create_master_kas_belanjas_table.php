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
        Schema::create('master_kas_belanjas', function (Blueprint $table) {
            $table->id();
            $table->string('nomor_transaksi');
            $table->date('tanggal_transaksi');
            $table->unsignedBigInteger('bank_id');
            $table->string('jenis_transaksi');
            $table->string('nilai');
            $table->string('keterangan')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('master_kas_belanjas');
    }
};
