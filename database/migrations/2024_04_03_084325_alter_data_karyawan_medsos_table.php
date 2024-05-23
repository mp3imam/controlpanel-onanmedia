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
        if (!Schema::connection('pgsql')->hasColumn('data_karyawan', 'linkedin'))
        Schema::connection('pgsql')->table('data_karyawan', function (Blueprint $table) {
            $table->string('linkedin')->nullable();
            $table->string('facebook')->nullable();
            $table->string('twitter')->nullable();
            $table->string('instagram')->nullable();
            $table->string('website')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::connection('pgsql')->table('data_karyawan', function (Blueprint $table) {
            $table->dropColumn(['linkedin', 'facebook', 'twitter', 'instagram', 'website']);
        });
    }
};