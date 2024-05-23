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
        if (!Schema::connection('pgsql')->hasColumn('transaksi_kas', 'bank_id'))
            Schema::connection('pgsql')->table('transaksi_kas', function (Blueprint $table) {
                $table->integer('bank_id')->nullable()->change();
                $table->string('belanjas_id')->nullable();
                $table->string('image')->nullable();
                $table->string('status')->nullable();
            });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::connection('pgsql')->table('transaksi_kas', function (Blueprint $table) {
            $table->dropColumn(['image']);
        });
    }
};