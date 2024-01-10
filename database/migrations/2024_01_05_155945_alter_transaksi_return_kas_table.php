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
        Schema::connection('pgsql')->table('transaksi_return_kas', function (Blueprint $table) {
            $table->unsignedBigInteger('tujuan_id');
            $table->string('alasan')->nullable();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::connection('pgsql')->table('transaksi_return_kas', function (Blueprint $table) {
            $table->dropColumn(['tujuan_id','alasan']);
            $table->dropSoftDeletes();
        });
    }
};
