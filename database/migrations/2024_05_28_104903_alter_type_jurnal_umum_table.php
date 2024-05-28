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
        if (!Schema::connection('pgsql')->hasColumn("jurnals_umum", "tipe"))
            Schema::connection('pgsql')->table('jurnals_umum', function (Blueprint $table) {
                $table->string('tipe')->default(0);
            });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropColumns(['tipe']);
    }
};