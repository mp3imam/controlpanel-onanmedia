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
        if (!Schema::connection('pgsql')->hasTable("data_karyawan_personal"))
        Schema::connection('pgsql')->create('data_karyawan_personal', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('data_karyawan_id');
            $table->string('no_ktp');
            $table->string('no_npwp');
            $table->unsignedBigInteger('tipe_pajak');
            $table->enum('tunjangan_pajak',['iya','tidak']);
            $table->string('tunjangan_pajak_dalam_persen');
            $table->unsignedBigInteger('bank');
            $table->string('no_bank');
            $table->string('no_ketenagakerjaan');
            $table->string('no_kesehatan');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('data_karyawan_personal');
    }
};
