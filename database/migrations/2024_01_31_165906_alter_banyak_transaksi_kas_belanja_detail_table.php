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
        Schema::connection('pgsql')->table('transaksi_kas_belanja_detail', function (Blueprint $table) {
            $table->string('nama_item');
            $table->integer('qty')->autoIncrement(false);
            $table->string('harga');
            $table->string('jumlah');
            $table->string('file');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::connection('pgsql')->table('transaksi_kas_belanja_detail', function (Blueprint $table) {
            $table->dropColumn(['nama_item','qty','harga','jumlah','file']);
        });
    }
};
