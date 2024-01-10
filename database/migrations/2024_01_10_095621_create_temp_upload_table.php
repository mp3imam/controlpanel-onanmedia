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
        if (!Schema::connection('pgsql')->hasTable("temp_upload"))
        Schema::connection('pgsql')->create('temp_upload', function (Blueprint $table) {
            $table->id();
            $table->string('url');
            $table->string('filename');
            $table->enum('status',[0,1])->default("0");
            $table->string('token');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::connection('pgsql')->dropIfExists('temp_upload');
    }
};
