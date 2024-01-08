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
        Schema::create('jurnal_umum_details', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('jurnal_umum_id');
            $table->unsignedBigInteger('account_id');
            $table->string('keterangan')->nullable();
            $table->bigInteger('debet')->default(0);
            $table->bigInteger('kredit')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jurnal_umum_details');
    }
};
