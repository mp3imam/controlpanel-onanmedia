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
        if (!Schema::connection('pgsql')->hasColumn('transaksi_kas_belanjas', 'checked'))
            Schema::connection('pgsql')->table('transaksi_kas_belanjas', function (Blueprint $table) {
                $table->string('checked')->default(0);
                $table->string('nominal_approve')->default(0);
                $table->string('nominal_pending')->default(0);
                $table->string('nominal_tolak')->default(0);
                $table->string('bukti_transfer_finance_to_divisi')->nullable();
                $table->string('bukti_transfer_divisi_to_finance')->nullable();
                $table->integer('account_id')->nullable()->change();
            });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::connection('pgsql')->table('transaksi_kas_belanjas', function (Blueprint $table) {
            $table->dropColumn(['checked', 'nominal_approve', 'nominal_pending', 'nominal_tolak']);
        });
    }
};
