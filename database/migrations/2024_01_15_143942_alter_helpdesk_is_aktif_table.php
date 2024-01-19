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
        // if (!Schema::connection('pgsql2')->hasColumn('HelpDesk','isAktif'))
        // Schema::connection('pgsql2')->table('HelpDesk', function (Blueprint $table) {
        //     $table->integer('isAktif', 32)->default(0)->autoIncrement(false);
        // });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Schema::connection('pgsql2')->table('HelpDesk', function (Blueprint $table) {
        //     $table->dropColumn(['isAktif']);
        // });
    }
};
