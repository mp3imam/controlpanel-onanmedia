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
        if (!Schema::connection('pgsql2')->hasColumn("OrderJasa", "OrderJasa"))
            Schema::connection('pgsql2')->table('OrderJasa', function (Blueprint $table) {
                $table->string('approve_legal_id')->nullable();
                $table->string('file')->nullable();
            });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropColumns(['approve_legal_id', 'file']);
    }
};
