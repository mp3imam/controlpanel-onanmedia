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
        if (!Schema::connection('pgsql')->hasTable('transaksi_kas_belanjas'))
            Schema::create('transaksi_kas_detail', function (Blueprint $table) {
                $table->id();
                $table->integer('kas_id')->autoIncrement(false);
                $table->integer('account_id')->autoIncrement(false);
                $table->string('keterangan');
                $table->string('nominal');
                $table->string('nama_item');
                $table->string('qty');
                $table->integer('satuan_id')->autoIncrement(false);
                $table->string('harga');
                $table->string('jumlah');
                $table->string('file');
                $table->string('status');
                $table->timestamps();
            });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transaksi_kas_detail');
    }
};
