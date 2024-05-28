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
        if (!Schema::connection('pgsql')->hasColumn('transaksi_kas_belanjas', 'jenis'))
            Schema::connection('pgsql')->table('transaksi_kas_belanjas', function (Blueprint $table) {
                $table->string('jenis')->default(1);
                $table->string('nominal')->nullable();
                $table->string('alasan')->nullable();
                $table->softDeletes();
            });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::connection('pgsql')->table('transaksi_kas_belanjas', function (Blueprint $table) {
            $table->dropColumn(['jenis', 'alasan', 'nominal']);
            $table->dropSoftDeletes();
        });
    }
};
