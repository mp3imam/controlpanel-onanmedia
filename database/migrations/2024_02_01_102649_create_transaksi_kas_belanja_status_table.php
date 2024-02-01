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
        if (!Schema::connection('pgsql')->hasTable("transaksi_kas_belanja_status"))
        Schema::connection('pgsql')->create('transaksi_kas_belanja_status', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('aktif')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transaksi_kas_belanja_status');
    }
};
