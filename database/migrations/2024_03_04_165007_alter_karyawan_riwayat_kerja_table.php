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
        if (!Schema::connection('pgsql')->hasColumn('riwayat_karyawan', 'alamat'))
        Schema::connection('pgsql')->table('riwayat_karyawan', function (Blueprint $table) {
            $table->text('alamat');
            $table->text('sertifikat')->nullable();
            $table->string('jabatan');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::connection('pgsql')->table('riwayat_karyawan', function (Blueprint $table) {
            $table->dropColumn(['alamat','sertifikat','jabatan']);
        });
    }
};