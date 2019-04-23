<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePlannersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('planners', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id');
            $table->datetime('start_time');
            $table->date('planner_date');
            $table->string('qotd', 256)->nullable();
            $table->string('targets', 512);
            $table->string('successes', 512)->nullable();
            $table->string('morning_goals', 512)->nullable();
            $table->string('night_goals', 512)->nullable();
            $table->string('block_1_tasks', 512);
            $table->string('block_2_tasks', 512);
            $table->string('block_3_tasks', 512);
            $table->string('block_4_tasks', 512);
            $table->string('block_5_tasks', 512);
            $table->string('block_6_tasks', 512);
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
        Schema::dropIfExists('planners');
    }
}
