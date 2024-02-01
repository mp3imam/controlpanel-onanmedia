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
        if (!Schema::connection('pgsql')->hasColumn("transaksi_kas_belanja_detail","nama_item"))
        Schema::connection('pgsql')->table('transaksi_kas_belanja_detail', function (Blueprint $table) {
            $table->integer('account_id')->nullable()->change();
            $table->string('nama_item')->default('-');
            $table->integer('qty')->autoIncrement(false)->default(1);
            $table->integer('satuan_id')->autoIncrement(false)->default(1);
            $table->string('harga')->default(1);
            $table->string('jumlah')->default(1);
            $table->string('file')->nullable();
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
