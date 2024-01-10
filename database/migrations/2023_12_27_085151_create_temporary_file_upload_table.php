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
        if (!Schema::connection('pgsql')->hasTable("temporary_file_upload"))
        Schema::connection('pgsql')->create('temporary_file_upload', function (Blueprint $table) {
            $table->id();
            $table->string('folder');
            $table->string('filename');
            $table->enum('status',[0,1])->default("0");
            $table->unsignedBigInteger('created_by');
            $table->string('token');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('temporary_file_upload');
    }
};
