<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRegisterTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('register', function (Blueprint $table) {
            $table->id();
            $table->string('user_image', 255);
            $table->string('user_name', 50);
            $table->string('mobile_no', 10);
            $table->string('user_address', 255);
            $table->string('user_email', 50);
            $table->string('lattitude', 20)->default(0);
            $table->string('longitude', 20)->default(0);
            $table->string('password', 255);
            $table->float('user_rating',8,2)->default(0);
            $table->string('status', 10);
            $table->string('user_token', 100);
            $table->integer('user_otp')->default(0);
            $table->integer('user_type');
            $table->timestamp('join_date')->useCurrent();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('register');
    }
}
