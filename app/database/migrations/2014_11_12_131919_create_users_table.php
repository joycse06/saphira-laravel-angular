<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
        Schema::create('users', function(Blueprint $table){
            $table->increments('id');
            $table->string('email');
            $table->string('password');
            $table->string('displayName');
            $table->string('facebook')->nullable();
            $table->string('foursquare')->nullable();
            $table->string('github')->nullable();
            $table->string('google')->nullable();
            $table->string('linkedin')->nullable();
            $table->string('twitter')->nullable();
            $table->softDeletes();
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
