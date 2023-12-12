<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        if (!Schema::connection('pgsql2')->hasTable("BatalTenderProposal"))
        Schema::connection('pgsql2')->create('BatalTenderProposal', function (Blueprint $table) {
            $table->string('id')->primary()->autoIncrement(true);
            $table->text('alasan');
            $table->text('msAlasanPembatalanTenderId')->nullable();
            $table->timestamp('createdAt')->nullable()->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('updatedAt')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::connection('pgsql2')->dropIfExists('BatalTenderProposal');
    }
};
