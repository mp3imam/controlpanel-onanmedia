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
        if (!Schema::connection('pgsql2')->hasColumn("faq_detail", "is_aktif"))
            Schema::connection('pgsql2')->table('faq_detail', function (Blueprint $table) {
                $table->string('is_aktif')->default(1);
                $table->softDeletes();
            });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::connection('pgsql2')->table('faq_detail', function (Blueprint $table) {
            $table->dropColumn(['is_aktif']);
            $table->dropSoftDeletes();
        });
    }
};