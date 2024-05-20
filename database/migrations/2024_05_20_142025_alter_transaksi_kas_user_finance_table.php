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
        Schema::connection('pgsql')->table('transaksi_kas_belanjas', function (Blueprint $table) {
            $table->string('approve_finance_id')->nullable();
            $table->string('transfer_finance_id')->nullable();
            $table->string('accept_finance_id')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::connection('pgsql')->table('transaksi_kas_belanjas', function (Blueprint $table) {
            $table->dropColumn(['approve_finance_id', 'transfer_finance_id', 'accept_finance_id']);
        });
    }
};