<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('account_id');
            $table->unsignedBigInteger('money')->default(0);
            $table->string('url_avata')->default('images/avata.png');
            $table->string('full_name')->default('Full Name');
            $table->string('phone')->default('0123456789');
            $table->string('email')->default('abcde@gmail.com');
            $table->string('address')->default('Address');
            $table->foreign('account_id')->references('id')->on('accounts');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('users');
    }
};
