<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('users', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('name', 50);
            $table->string('last_name', 50);
			$table->string('email')->unique();
			$table->string('password', 60);
            $table->string('thumbnail')->nullable()->default(null);
            $table->boolean('is_admin')->default(false);
			$table->rememberToken();
			$table->timestamps();
            $table->softDeletes();
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

        //delete everything inside the profile pictures directory
        $path = public_path().'/content/profile_pictures/';
        File::deleteDirectory($path, true);
	}

}
