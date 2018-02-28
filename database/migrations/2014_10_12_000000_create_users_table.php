<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->increments('id');
            $table->string('name');
            $table->string('mobile1');
            $table->string('mobile2')->nullable();
            $table->string('email')->unique();
            $table->string('password');
            $table->string('district');
            $table->string('thana');
            $table->string('village');
            $table->string('marriage_status');
            $table->string('picture')->nullable();
            $table->string('code')->nullable();
            $table->tinyInteger('user_type')->default(2);
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
