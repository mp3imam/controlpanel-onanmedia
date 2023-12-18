<?php

use Carbon\Carbon;
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
        Schema::table('tbl_data_karyawan', function (Blueprint $table) {
            $table->string('no_rek')->default('-')->after('text');
            $table->date('kontrak')->default(Carbon::now()->addMonth(3))->after('text');
            $table->text('alamat')->default('-')->after('text');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('tbl_data_karyawan', function (Blueprint $table) {
            $table->dropColumn(['no_rek','kontrak','alamat']);
        });
    }
};
