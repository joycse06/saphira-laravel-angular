<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddFieldsToUsersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('users',function(Blueprint $table){

            $table->string('displayName')->nullable();
            $table->string('username')->unique();
            $table->string('facebook')->nullable();
            $table->string('foursquare')->nullable();
            $table->string('github')->nullable();
            $table->string('google')->nullable();
            $table->string('linkedin')->nullable();
            $table->string('twitter')->nullable();
        });
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('users', function(Blueprint $table){
           $table->dropColumn([
               'displayName',
               'username',
               'facebook',
               'foursquare',
               'github',
               'google',
               'linkedin',
               'twitter'
           ]);
        });
	}

}
