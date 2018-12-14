<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBookSummariesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('book_summaries', function (Blueprint $table) {
            $table->increments('id');
            $table->string('book_title', 128);
            $table->string('book_image_url', 512);
            $table->string('author', 128);
            $table->string('description', 512);
            $table->string('link', 256);
            $table->integer('views')->default(0);
            $table->integer('is_active')->default(1);
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
        Schema::dropIfExists('book_summaries');
    }
}
