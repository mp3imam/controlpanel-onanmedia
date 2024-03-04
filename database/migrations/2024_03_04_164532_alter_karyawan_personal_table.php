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
        Schema::connection('pgsql')->table('data_karyawan_personal', function (Blueprint $table) {
            $table->text('foto_ktp')->nullable();
            $table->text('foto_kk')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::connection('pgsql')->table('data_karyawan_personal', function (Blueprint $table) {
            $table->dropColumn(['foto_ktp','foto_kk']);
        });
    }
};
