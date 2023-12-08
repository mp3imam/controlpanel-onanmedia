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
        Schema::connection('pgsql')->create('tbl_belanja_header', function (Blueprint $table) {
            $table->string('id')->primary()->autoIncrement(true);
            $table->date('create_date')->nullable();
            $table->integer('id_karyawan', 4)->autoIncrement(false)->nullable();
            $table->string('status_data', 100)->nullable();
            $table->string('create_by', 100)->nullable();
            $table->string('no_kas', 50)->nullable();
            $table->date('tgl_kas')->nullable();
            $table->timestamp('update_date')->nullable();
            $table->string('update_by', 100)->nullable();
            $table->string('jenis_kas', 60)->nullable();
            $table->string('sumber', 50)->nullable();
            $table->integer('cl_perusahaan_id', 4)->autoIncrement(false)->nullable();
            $table->string('guid', 100)->nullable();
            $table->string('ket')->nullable();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::connection('pgsql')->dropIfExists('tbl_belanja_header');
    }
};
