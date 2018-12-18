<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePublicToolsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('public_tools', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title', 128);
            $table->string('description', 512);
            $table->string('image_url', 512);
            $table->string('link_url', 256);
            $table->string('category', 128);
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
        Schema::dropIfExists('public_tools');
    }
}
