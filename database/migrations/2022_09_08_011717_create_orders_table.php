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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('account_id');
            $table->unsignedBigInteger('rank1_id');
            $table->unsignedBigInteger('rank2_id');
            $table->unsignedBigInteger('star1');
            $table->unsignedBigInteger('star2');
            $table->unsignedBigInteger('totalMoney');
            $table->timestamps();

            $table->foreign('rank1_id')->references('id')->on('sub_ranks');
            $table->foreign('rank2_id')->references('id')->on('sub_ranks');
            $table->foreign('account_id')->references('id')->on('accounts');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders');
    }
};
