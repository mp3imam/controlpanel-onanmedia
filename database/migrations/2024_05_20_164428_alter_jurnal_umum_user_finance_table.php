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
        if (!Schema::connection('pgsql')->hasColumn('jurnals_umum', 'user_onan'))
        Schema::connection('pgsql')->table('jurnals_umum', function (Blueprint $table) {
            $table->string('user_onan')->nullable();
            $table->string('approve_finance')->nullable();
            $table->string('transfer_finance')->nullable();
            $table->string('accept_finance')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::connection('pgsql')->table('jurnals_umum', function (Blueprint $table) {
            $table->dropColumn(['user_onan', 'approve_finance', 'transfer_finance', 'accept_finance']);
        });
    }
};