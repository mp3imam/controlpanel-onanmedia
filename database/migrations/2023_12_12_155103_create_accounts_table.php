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
        if (!Schema::connection('pgsql2')->hasTable("Account"))
        Schema::connection('pgsql2')->create('Account', function (Blueprint $table) {
            $table->string('id')->primary()->autoIncrement(true);
            $table->text('userId');
            $table->text('type');
            $table->text('provider');
            $table->text('providerAccountId');
            $table->text('refresh_token')->nullable();
            $table->text('access_token')->nullable();
            $table->integer('expires_at', 4)->autoIncrement(false)->nullable();
            $table->text('token_type')->nullable();
            $table->text('scope')->nullable();
            $table->text('id_token')->nullable();
            $table->text('session_state')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::connection('pgsql2')->dropIfExists('Account');
    }
};
