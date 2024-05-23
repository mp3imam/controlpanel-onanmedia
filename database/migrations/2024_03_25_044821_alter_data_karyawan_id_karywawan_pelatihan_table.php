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
        if (!Schema::connection('pgsql')->hasColumn('karyawan_pelatihan', 'data_karyawan_id'))
        Schema::connection('pgsql')->table('karyawan_pelatihan', function (Blueprint $table) {
            $table->unsignedBigInteger('data_karyawan_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::connection('pgsql')->table('karyawan_pelatihan', function (Blueprint $table) {
            $table->dropColumn(['data_karyawan_id']);
        });
    }
};