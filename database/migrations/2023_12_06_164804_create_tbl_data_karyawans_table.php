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
        Schema::create('tbl_data_karyawan', function (Blueprint $table) {
            $table->id();
            $table->date('create_date')->nullable();
            $table->string('create_by')->nullable();
            $table->timestamp('update_date')->nullable();
            $table->string('update_by')->nullable();
            $table->string('guid', 100)->nullable();
            $table->string('nik')->nullable();
            $table->string('nama', 100)->nullable();
            $table->string('email')->nullable();
            $table->string('jenis_kelamin', 100)->nullable();
            $table->string('no_hp', 100)->nullable();
            $table->string('no_ktp', 100)->nullable();
            $table->string('no_npwp', 100)->nullable();
            $table->string('file_ktp')->nullable();
            $table->string('file_npwp')->nullable();
            $table->string('status_pegawai', 100)->nullable();
            $table->integer('cl_divisi_id', 8)->nullable()->autoIncrement(false);
            $table->integer('cl_posisi_id', 8)->nullable()->autoIncrement(false);
            $table->text('text')->nullable();
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
        Schema::dropIfExists('tbl_data_karyawan');
    }
};
