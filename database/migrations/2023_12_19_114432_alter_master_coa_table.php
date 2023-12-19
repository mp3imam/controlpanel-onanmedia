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
        Schema::table('cl_coa', function (Blueprint $table) {
            $table->string('metode_penyusutan')->nullable()->after('type');
            $table->string('rekening_bank')->nullable()->after('type');
            $table->text('alamat_bank')->nullable()->after('type');
            $table->string('nama_bank')->nullable()->after('type');
            $table->string('account_name')->nullable()->after('type');
            $table->string('swift_code')->nullable()->after('type');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('tbl_data_karyawan', function (Blueprint $table) {
            $table->dropColumn(['metode_penyusutan','rekening_bank','alamat_bank','nama_bank','account_name','swift_code']);
        });
    }
};
