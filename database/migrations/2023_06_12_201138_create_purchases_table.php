<?php

use Carbon\Carbon;
use Carbon\PHPStan\AbstractMacro;
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
        Schema::create('purchases', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('product');
            $table->string('description')->nullable();
            $table->decimal('cost', 8, 2, true);
            $table->dateTime('purchased')->nullable();
            $table->uuid('category_id');
            $table->uuid('card_id');
            $table->integer('user_id');
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
        Schema::dropIfExists('purchases');
    }
};
