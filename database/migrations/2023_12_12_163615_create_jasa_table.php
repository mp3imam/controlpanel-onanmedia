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
        if (!Schema::connection('pgsql2')->hasTable("Jasa"))
        Schema::connection('pgsql2')->create('Jasa', function (Blueprint $table) {
            $table->string('id')->primary()->autoIncrement(true);
            $table->text('nama');
            $table->integer('msSubkategoriId', 8)->autoIncrement(false);
            $table->integer('msKategoriId', 8)->autoIncrement(false);
            $table->text('tags')->nullable();
            $table->integer('impresi', 4)->nullable()->default(0)->autoIncrement(false);
            $table->integer('klik', 4)->nullable()->default(0)->autoIncrement(false);
            $table->text('userId');
            $table->text('deskripsi');
            $table->timestamp('createdAt')->nullable()->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('updatedAt')->nullable();
            $table->text('cover');
            $table->text('slug');
            $table->integer('hargaTermahal',4)->autoIncrement(false);
            $table->integer('hargaTermurah',4)->autoIncrement(false);
            $table->integer('msStatusJasaId',4)->default(2)->autoIncrement(false);
            $table->integer('isPengambilan',4)->default(0)->autoIncrement(false);
            $table->integer('isPengiriman',4)->default(0)->autoIncrement(false);
            $table->integer('isUnggulan',4)->default(0)->autoIncrement(false);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('Jasa');
    }
};
