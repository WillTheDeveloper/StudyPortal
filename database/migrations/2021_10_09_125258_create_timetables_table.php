<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTimetablesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('timetables', function (Blueprint $table) {
            $table->id();
            $table->time('start');
            $table->time('end');
            $table->integer('subject_id')->nullable(false);
            $table->integer('institution_id')->nullable(true);
//            $table->string('tutor')->nullable(true);
            $table->integer('user_id');
            $table->tinyText('weekday');
            $table->tinyText('room');
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
        Schema::dropIfExists('timetables');
    }
}
