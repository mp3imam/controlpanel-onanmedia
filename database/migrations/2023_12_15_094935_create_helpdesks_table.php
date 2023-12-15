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
        if (!Schema::hasTable("helpdesks"))
        Schema::create('helpdesks', function (Blueprint $table) {
            $table->id();
            $table->string('jasa_id');
            $table->string('order_id');
            $table->string('user_id');
            $table->string('admin_id')->nullable();
            $table->string('admin_name')->nullable();
            $table->string('nomor_keluhan');
            $table->string('keluhan');
            $table->text('pesan');
            $table->integer('status_helpdesk',4)->autoIncrement(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('helpdesks');
    }
};
