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
        Schema::create('role_accounts', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_account');
            $table->unsignedBigInteger('id_role');
            $table->foreign('id_account')->references('id')->on('accounts');
            $table->foreign('id_role')->references('id')->on('roles');
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
        Schema::dropIfExists('role_accounts');
    }
};
