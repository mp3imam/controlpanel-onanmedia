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
        if (!Schema::connection('pgsql')->hasColumn('transaksi_kas_belanja_detail', 'biaya_pengiriman'))
        Schema:: connection('pgsql')->table('transaksi_kas_belanja_detail', function (Blueprint $table) {
            $table->string('biaya_pengiriman')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::connection('pgsql')->table('transaksi_kas_belanja_detail', function (Blueprint $table) {
            $table->dropColumn('biaya_pengiriman');
        });
    }
};