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
        if (!Schema::connection('pgsql')->hasTable("ms_jabatan"))
        Schema::connection('pgsql')->create('ms_jabatan', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('kode')->default(1);
            $table->string('aktif')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ms_jabatan');
    }
};
