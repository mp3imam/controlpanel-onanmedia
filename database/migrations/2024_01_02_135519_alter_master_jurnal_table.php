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
        Schema::connection('pgsql')->table('jurnals_umum', function (Blueprint $table) {
            $table->unsignedBigInteger('bank_id')->nullable();
            $table->string('jenis')->default(1);
            $table->string('alasan')->nullable();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::connection('pgsql')->table('jurnals_umum', function (Blueprint $table) {
            $table->dropColumn(['bank_id','jenis','alasan']);
            $table->dropSoftDeletes();
        });
    }
};
