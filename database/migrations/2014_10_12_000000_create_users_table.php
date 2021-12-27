<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('username')->unique()->nullable();
            $table->string('bio')->nullable();
            $table->boolean('is_tutor')->default('0');
            $table->boolean('is_admin')->default('0');
            $table->boolean('is_moderator')->default('0');
            $table->boolean('is_banned')->default('0');
            $table->integer('github_id')->nullable(true)->default(null);
            $table->string('github_token')->nullable(true)->default(null);
            $table->string('github_refresh_token')->nullable(true)->default(null);
            $table->integer('institution_id')->nullable(true)->default(null);
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
