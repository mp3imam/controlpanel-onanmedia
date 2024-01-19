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
        if (!Schema::connection('pgsql')->hasTable("transaksi_kas_file"))
        Schema::connection('pgsql')->create('transaksi_kas_file', function (Blueprint $table) {
            $table->id();
            $table->integer('kas_id')->autoIncrement(false);
            $table->string('url');
            $table->string('filename');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transaksi_kas_file');
    }
};
