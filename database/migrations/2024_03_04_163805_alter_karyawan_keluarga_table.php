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
        if (!Schema::connection('pgsql')->hasColumn('keluarga_karyawan', 'hubungan'))
        Schema::connection('pgsql')->table('keluarga_karyawan', function (Blueprint $table) {
            $table->string('hubungan');
            $table->string('agama_id');
            $table->string('pekerjaan');
            $table->string('no_hp')->nullable();
            $table->text('alamat');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::connection('pgsql')->table('keluarga_karyawan', function (Blueprint $table) {
            $table->dropColumn(['hubungan','agama_id','pekerjaan','alamat','no_hp']);
        });
    }
};