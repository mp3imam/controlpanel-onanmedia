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
        Schema::connection('pgsql')->table('transaksi_kas_belanjas', function (Blueprint $table) {
            $table->string('upload_bukti_barang_selesai')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::connection('pgsql')->table('transaksi_kas_belanjas', function (Blueprint $table) {
            $table->string('upload_bukti_barang_selesai')->default(0);
        });
    }
};