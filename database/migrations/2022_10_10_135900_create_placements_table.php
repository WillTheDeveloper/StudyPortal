<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('placements', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->integer('user_id');
            $table->text('location');
            $table->text('company');
            $table->text('role');
            $table->text('title');
            $table->text('description');
            $table->text('requirements');
            $table->text('slug')->nullable(false);
            $table->boolean('open')->default(true)->comment('Can users apply for it?');
            $table->boolean('active')->default(true)->comment('Is the placement visible on the site?');
            $table->date('closing')->default(now()->addWeek());
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
        Schema::dropIfExists('placements');
    }
};
