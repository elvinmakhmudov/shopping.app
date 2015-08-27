<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Schema;
use Kalnoy\Nestedset\NestedSet;

class CreateCategoriesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
        Schema::create('categories', function(Blueprint $table)
        {
            $table->increments('id');
            $table->string('title');
            $table->string('slug')->unique();
            $table->timestamps();
            $table->softDeletes();
            NestedSet::columns($table);
        });
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
        Schema::drop('categories');
	}

}
