<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRecommendedTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('recommended', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('media_type');
            $table->string('movie_title', 256);
            $table->string('movie_image_link', 512);
            $table->string('article_title', 256);
            $table->string('article_link', 256);
            $table->string('book_title', 256);
            $table->string('book_image_link', 256);
            $table->string('book_amazon_link', 1024);
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
        Schema::dropIfExists('recommended');
    }
}
