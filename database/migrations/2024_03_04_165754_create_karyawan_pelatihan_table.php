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
        if (!Schema::connection('pgsql')->hasTable('karyawan_pelatihan'))
            Schema::create('karyawan_pelatihan', function (Blueprint $table) {
                $table->id();
                $table->string('nama');
                $table->string('periode');
                $table->string('sertifikat')->nullable();
                $table->timestamps();
            });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('karyawan_pelatihan');
    }
};
