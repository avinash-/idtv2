<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateToolsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('tools', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('acc_id');
            $table->string('emp_id');
            $table->string('emp_name');
            $table->string('tool_name');
            $table->integer('access');
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
		Schema::drop('tools');
	}

}
