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
        if (!Schema::connection('pgsql2')->hasColumn("OrderJasa", "bank_user_id"))
            Schema::connection('pgsql2')->table('OrderJasa', function (Blueprint $table) {
                $table->string('bank_user_id')->nullable();
            });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropColumns(['bank_user_id']);
    }
};
