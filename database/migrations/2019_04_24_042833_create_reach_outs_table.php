<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReachOutsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reach_outs', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id');
            $table->integer('reachout_type');
            $table->string('contact_category', 128);
            $table->string('contact_first_name', 64);
            $table->string('contact_last_name', 64)->nullable();
            $table->date('contact_date')->nullable();
            $table->string('contact_email', 128)->nullable();
            $table->string('contact_phone', 64)->nullable();
            $table->string('contact_skype', 64)->nullable();
            $table->string('contact_facebook', 128)->nullable();
            $table->string('contact_twitter', 128)->nullable();
            $table->string('contact_linkedin', 128)->nullable();
            $table->string('contact_instagram', 128)->nullable();
            $table->string('contact_youtube', 128)->nullable();
            $table->string('contact_website', 128)->nullable();
            $table->text('contact_notes')->nullable();
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
        Schema::dropIfExists('reach_outs');
    }
}
