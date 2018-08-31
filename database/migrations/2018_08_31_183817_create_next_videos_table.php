<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNextVideosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('next_videos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('option_1_title', 256);
            $table->text('option_1_description');
            $table->integer('option_1_votes');
            $table->string('option_2_title', 256);
            $table->text('option_2_description');
            $table->integer('option_2_votes');
            $table->string('option_3_title', 256);
            $table->text('option_3_description');
            $table->integer('option_3_votes');
            $table->string('option_4_title', 256);
            $table->text('option_4_description');
            $table->integer('option_4_votes');
            $table->datetime('start_time');
            $table->datetime('end_time');
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
        Schema::dropIfExists('next_videos');
    }
}
