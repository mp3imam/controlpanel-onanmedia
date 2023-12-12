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
        if (!Schema::connection('pgsql')->hasTable("tbl_user"))
        Schema::connection('pgsql')->create('tbl_user', function (Blueprint $table) {
            $table->string('id')->primary()->autoIncrement(true);
            $table->string('username', 100);
            $table->string('password', 200);
            $table->integer('cl_user_group_id', 2)->autoIncrement(false);
            $table->string('nama_lengkap', 200);
            $table->string('status', 1);
            $table->integer('cl_perusahaan_id', 4)->autoIncrement(false);
            $table->timestamp('update_date');
            $table->string('update_by', 100);
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
        Schema::connection('pgsql')->dropIfExists('tbl_user');
    }
};
