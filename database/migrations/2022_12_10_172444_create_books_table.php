<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBooksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('books', function (Blueprint $table) {
            $table->id();
            $table->string('book_name',30);
            $table->string('book_image',255);
            $table->integer('genre_id');
            $table->string('author',50);
            $table->integer('edition');
            $table->string('publisher',100);
            $table->string('description',255);
            $table->integer('book_status')->default(1)->comment('1=active and 0=block');
            $table->float('book_rating',8,2)->default(0);
            $table->integer('owner_id')->references('id')->on('register')->onDelete('cascade');;
            $table->string('isbn',15)->default(0);
            $table->integer('rq_status')->default(0)->comment('0=available 1=issued 2=returning');
            $table->integer('book_condition')->default(1)->comment('0=bad, 1=good, 2=best');
            $table->integer('book_lang')->default(0);
            $table->string('lattitude',17)->default(0);
            $table->string('longitude',17)->default(0);
            $table->timestamp('upload_date')->useCurrent();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('books');
    }
}
