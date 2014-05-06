<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWidgetsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		//Creating the table widgets for our class Widget
		Schema::create('widgets', function($table){
			$table->increments('id');
			$table->integer('quantity');
			$table->string('color', 10);
			$table->datetime('byDate');
			$table->string('type', 10);
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
		//Bringing in down (just in case)
		Schema::dropIfExists('widgets');
	}

}
