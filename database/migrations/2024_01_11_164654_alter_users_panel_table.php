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
        if (!Schema::connection('pgsql')->hasColumn('tbl_user', 'isHelpdesk'))
        Schema::connection('pgsql')->table('tbl_user', function (Blueprint $table) {
            $table->string('isHelpdesk')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::connection('pgsql')->table('tbl_user', function (Blueprint $table) {
            $table->dropColumn(['isHelpdesk']);
        });
    }
};