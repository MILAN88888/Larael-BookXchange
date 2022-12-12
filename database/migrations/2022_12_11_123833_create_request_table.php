<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRequestTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('request', function (Blueprint $table) {
            $table->id();
            $table->integer('requester_id')->references('id')->on('register')->onDelete('cascade');
            $table->integer('owner_id')->references('id')->on('register')->onDelete('cascade');
            $table->integer('book_id')->references('id')->on('books')->onDelete('cascade');
            $table->integer('status')->comment('1=requested, 1=issued, 2=returning, 3=returned, 4=rejected');
            $table->string('reason',255)->default('0');
            $table->date('rqst_date');
            $table->date('issued_date');
            $table->date('return_date');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('request');
    }
}
