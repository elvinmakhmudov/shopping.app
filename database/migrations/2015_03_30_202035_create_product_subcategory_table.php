<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductSubcategoryTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('product_subcategory', function(Blueprint $table)
		{
            $table->increments('id');
            $table->integer('product_id')->references('id')->on('products');
            $table->integer('subcategory_id')->references('id')->on('subcategories');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('product_subcategory');
	}

}
