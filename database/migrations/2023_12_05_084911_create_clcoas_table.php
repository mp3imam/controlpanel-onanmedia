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
        if (!Schema::hasTable("cl_coa"))
        Schema::create('cl_coa', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->string('kdrek1');
            $table->string('kdrek2');
            $table->string('kdrek3');
            $table->string('kdrek');
            $table->string('uraian');
            $table->string('type');
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
        Schema::dropIfExists('cl_coa');
    }
};
