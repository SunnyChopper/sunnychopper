<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateRecommendedTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('recommended', function($table) {
            $table->string('movie_title', 256)->nullable()->change();
            $table->string('movie_image_link', 512)->nullable()->change();
            $table->string('article_title', 256)->nullable()->change();
            $table->string('article_link', 256)->nullable()->change();
            $table->string('book_title', 256)->nullable()->change();
            $table->string('book_image_link', 256)->nullable()->change();
            $table->string('book_amazon_link', 1024)->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('recommended', function($table) {
            $table->string('movie_title', 256)->change();
            $table->string('movie_image_link', 512)->change();
            $table->string('article_title', 256)->change();
            $table->string('article_link', 256)->change();
            $table->string('book_title', 256)->change();
            $table->string('book_image_link', 256)->change();
            $table->string('book_amazon_link', 1024)->change();
        });
    }
}
