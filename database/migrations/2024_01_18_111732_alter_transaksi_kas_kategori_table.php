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
        if (!Schema::connection('pgsql')->hasColumn('transaksi_kas','kategori'))
        Schema::connection('pgsql')->table('transaksi_kas', function (Blueprint $table) {
            $table->integer('kategori', 32)->default(0)->autoIncrement(false);
            $table->integer('tujuan_id', 32)->default(0)->autoIncrement(false);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::connection('pgsql')->table('transaksi_kas', function (Blueprint $table) {
            $table->dropColumn(['kategori, tujuan_id']);
        });
    }
};
