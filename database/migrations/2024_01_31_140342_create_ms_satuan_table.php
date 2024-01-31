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
        if (!Schema::connection('pgsql')->hasTable("ms_satuan"))
        Schema::create('ms_satuan', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('slug');
            $table->tinyInteger('isAktif')->autoIncrement(false)->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ms_satuan');
    }
};
