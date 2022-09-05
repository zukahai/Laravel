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
        Schema::create('sub_ranks', function (Blueprint $table) {
            $table->id();
            $table->string('sub_rank_name');
            $table->unsignedBigInteger('rank_id');
            $table->unsignedBigInteger('price');
            $table->unsignedBigInteger('value');
            $table->timestamps();
            $table->foreign('rank_id')->references('id')->on('ranks');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sub_ranks');
    }
};
