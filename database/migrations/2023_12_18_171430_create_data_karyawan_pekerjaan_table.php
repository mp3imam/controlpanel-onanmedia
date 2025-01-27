<?php

use Carbon\Carbon;
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
        if (!Schema::connection('pgsql')->hasTable("data_karyawan_pekerjaan"))
        Schema::connection('pgsql')->create('data_karyawan_pekerjaan', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('data_karyawan_id');
            $table->unsignedBigInteger('cabang_id');
            $table->unsignedBigInteger('departement_id');
            $table->unsignedBigInteger('jabatan_id');
            $table->unsignedBigInteger('cost_center_id');
            $table->date('tanggal_masuk')->default(Carbon::now());
            $table->date('kontrak_selesai');
            $table->unsignedBigInteger('status_kontrak');
            $table->enum('potongan_terlambat', [0,1])->default(1);
            $table->string('toleransi_keterlambatan')->default(0);
            $table->enum('absen_diluar_kantor', [0,1])->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('data_karyawan_pekerjaan');
    }
};
