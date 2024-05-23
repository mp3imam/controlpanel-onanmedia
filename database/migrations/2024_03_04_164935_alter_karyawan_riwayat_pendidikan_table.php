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
        if (!Schema::connection('pgsql')->hasColumn('pendidikan_karyawan', 'alamat'))
            Schema::connection('pgsql')->table('pendidikan_karyawan', function (Blueprint $table) {
                $table->text('alamat');
                $table->year('tahun_masuk');
                $table->year('tahun_keluar');
                $table->text('sertifikat')->nullable();
            });

        // Schema::connection('pgsql')->table('pendidikan_karyawan', function (Blueprint $table) {
        //     $table->dropColumn('tahun_lulus');
        // });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::connection('pgsql')->table('pendidikan_karyawan', function (Blueprint $table) {
            $table->dropColumn(['alamat', 'tahun_masuk', 'tahun_keluar', 'sertifikat']);
        });
    }
};