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
        if (!Schema::connection('pgsql')->hasTable("file_jurnal"))
        Schema::connection('pgsql')->create('file_jurnal', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('jurnal_umum_id');
            $table->string('path');
            $table->string('filename');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('file_jurnal');
    }
};
