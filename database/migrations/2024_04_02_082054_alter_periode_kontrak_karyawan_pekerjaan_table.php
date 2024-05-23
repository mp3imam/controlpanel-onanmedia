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
        if (!Schema::connection('pgsql')->hasColumn('data_karyawan_pekerjaan', 'periode_kontrak'))
        Schema::connection('pgsql')->table('data_karyawan_pekerjaan', function (Blueprint $table) {
            $table->string('periode_kontrak')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::connection('pgsql')->table('data_karyawan_pekerjaan', function (Blueprint $table) {
            $table->dropColumn('periode_kontrak');
        });
    }
};