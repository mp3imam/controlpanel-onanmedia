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
        Schema::connection('pgsql')->table('keluarga_karyawan', function (Blueprint $table) {
            $table->string('hubungan');
            $table->string('pekerjaan');
            $table->text('alamat');
            $table->string('usia');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::connection('pgsql')->table('keluarga_karyawan', function (Blueprint $table) {
            $table->dropColumn(['hubungan','pekerjaan','alamat','usia']);
        });
    }
};
