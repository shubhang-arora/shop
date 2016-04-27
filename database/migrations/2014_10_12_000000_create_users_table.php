<?php

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
            $table->string('shop_name');
            $table->string('user_name');
            $table->string('email')->unique();
            $table->string('location');
            $table->integer('zipcode_id')->unsigned();
            $table->string('phone');
            $table->integer('amount_paid');
            $table->integer('premium_shop')->default(0);
            $table->text('description');
            $table->string('password', 60);
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
        Schema::drop('users');
    }
}
