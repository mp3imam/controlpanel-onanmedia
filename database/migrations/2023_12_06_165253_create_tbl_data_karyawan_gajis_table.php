<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::connection('pgsql')->hasTable("tbl_data_karyawan_gaji"))
        Schema::connection('pgsql')->create('tbl_data_karyawan_gaji', function (Blueprint $table) {
            $table->integer('id', 8)->autoIncrement(false);
            $table->date('create_date')->nullable();
            $table->string('create_by')->nullable();
            $table->string('update_by')->nullable();
            $table->string('guid', 100)->nullable();
            $table->text('gaji')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::connection('pgsql')->dropIfExists('tbl_data_karyawan_gaji');
    }
};
