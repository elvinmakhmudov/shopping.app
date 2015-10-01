<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrdersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('orders', function(Blueprint $table)
		{
			$table->increments('id');
            $table->text('name')->nullable();
            $table->text('last_name')->nullable();
            $table->text('email')->nullable();
            $table->text('telephone')->nullable();
            $table->text('address')->nullable();
            $table->text('message')->nullable();
            $table->integer('product_id')->unsigned();
            $table->integer('user_id')->unsigned()->nullable();
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
		Schema::drop('orders');
	}

}
