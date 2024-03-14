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
        Schema::connection('pgsql')->table('transaksi_kas_detail', function (Blueprint $table) {
            $table->string('file')->nullable()->change();
            $table->string('username');
            $table->string('nomor_transaksi');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::connection('pgsql')->table('transaksi_kas_detail', function (Blueprint $table) {
            $table->dropColumn(['username','nomor_transaksi']);
        });
    }
};
