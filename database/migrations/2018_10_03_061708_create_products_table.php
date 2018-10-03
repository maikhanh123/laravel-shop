<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateProductsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('products', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->string('product_name');
			$table->text('product_des', 65535);
			$table->string('product_cat');
			$table->string('product_image');
			$table->float('product_price', 10, 0);
			$table->float('product_reduce', 10, 0);
			$table->integer('product_quantity');
			$table->date('product_dateCreate');
			$table->date('product_dateUpdate')->nullable();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('products');
	}

}
