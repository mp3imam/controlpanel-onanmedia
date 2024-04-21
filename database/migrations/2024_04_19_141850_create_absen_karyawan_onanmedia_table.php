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
        Schema::create('absen_karyawan_onanmedia', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id')->autoIncrement(false);
            $table->string('foto');
            $table->enum('jenis_absen', ['Masuk', 'Pulang']);
            $table->enum('status', ['Hadir', 'Telat', 'Izin']);
            $table->string('keterangan')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('absen_karyawan_onanmedia');
    }
};
