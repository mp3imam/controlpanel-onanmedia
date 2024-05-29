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
        if (!Schema::connection('pgsql2')->hasColumn("OrderJasa", "approve_name"))
            Schema::connection('pgsql2')->table('OrderJasa', function (Blueprint $table) {
                $table->string('approve_name')->nullable();
                $table->string('finance_name')->nullable();
                $table->string('file_upload')->nullable();
            });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropColumns(['approve_name', 'finance_name', 'file']);
    }
};