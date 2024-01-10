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
        if (!Schema::connection('pgsql')->hasTable("ms_cabang"))
        Schema::connection('pgsql')->create('ms_cabang', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->text('alamat');
            $table->string('kode')->default(1);
            $table->string('lat')->nullable();
            $table->string('log')->nullable();
            $table->string('radius')->default(100);
            $table->string('phone_1');
            $table->string('phone_2')->nullable();
            $table->time('jam_masuk_weekday')->default('08:00:00');
            $table->time('jam_masuk_weekend')->default('09:00:00');
            $table->time('jam_keluar_weekday')->default('17:00:00');
            $table->time('jam_keluar_weekend')->default('14:00:00');
            $table->string('aktif')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ms_cabang');
    }
};
