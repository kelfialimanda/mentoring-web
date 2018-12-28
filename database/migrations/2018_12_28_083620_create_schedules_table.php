<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSchedulesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('schedules', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->string('subtitle');
            $table->dateTime('start_date');
            $table->dateTime('end_date');
            $table->text('description');
            $table->smallInteger('status'); // 0 for haven't approved, 1 for approved, 2 for rejected
            $table->unsignedInteger('major_id');
            $table->unsignedInteger('difficulty_id');
            $table->unsignedInteger('target_id');
            $table->unsignedInteger('mentor_id');
            $table->timestamps();

            $table->foreign('major_id')->references('id')->on('majors');
            $table->foreign('difficulty_id')->references('id')->on('difficulties');
            $table->foreign('target_id')->references('id')->on('targets');
            $table->foreign('mentor_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('schedules');
    }
}
