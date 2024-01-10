<?php

use Carbon\Carbon;
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
        if (!Schema::connection('pgsql')->hasTable("transaksi_kas_belanjas"))
        Schema::connection('pgsql')->create('transaksi_kas_belanjas', function (Blueprint $table) {
            $table->id();
            $table->string('nomor_transaksi');
            $table->date('tanggal_transaksi')->default(Carbon::now()->format('Y-m-d'));
            $table->unsignedBigInteger('account_id');
            $table->string('keterangan_kas')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transaksi_kas_belanjas');
    }
};
