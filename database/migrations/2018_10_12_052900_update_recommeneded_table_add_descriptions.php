<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateRecommenededTableAddDescriptions extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('recommended', function (Blueprint $table) {
            $table->string('article_description', 1024)->nullable();
            $table->string('movie_description', 1024)->nullable();
            $table->string('book_description', 1024)->nullable();
            $table->string('movie_amazon_link', 1024)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('recommended', function (Blueprint $table) {
            $table->dropColumn('article_description');
            $table->dropColumn('movie_description');
            $table->dropColumn('book_description');
            $table->dropColumn('movie_amazon_link');
        });
    }
}
