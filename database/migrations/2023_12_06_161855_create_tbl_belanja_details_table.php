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
        Schema::connection('pgsql')->create('tbl_belanja_detail', function (Blueprint $table) {
            $table->string('id')->primary()->autoIncrement(true);
            $table->string('kdrek', 20)->nullable();
            $table->float('nilai_total')->nullable();
            $table->integer('tbl_belanja_header_id', 8)->autoIncrement(false)->nullable();
            $table->string('jenis_kas', 50)->nullable();
            $table->float('qty')->autoIncrement(false)->nullable();
            $table->float('harga')->autoIncrement(false)->nullable();
            $table->string('ket')->nullable();
            $table->string('guid', 100)->nullable();
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
        Schema::connection('pgsql')->dropIfExists('tbl_belanja_detail');
    }
};
