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
        if (!Schema::connection('pgsql2')->hasColumn('User','isHelpdesk'))
        Schema::connection('pgsql2')->table('User', function (Blueprint $table) {
            $table->integer('isHelpdesk', 32)->default(0)->autoIncrement(false);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::connection('pgsql2')->table('User', function (Blueprint $table) {
            $table->dropColumn(['isHelpdesk']);
        });
    }
};
