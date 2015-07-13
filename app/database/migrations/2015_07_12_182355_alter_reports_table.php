<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterReportsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('reports', function($table)
		{
		 	$table->renameColumn('percentage', 'lastweek_percentage');
		 	$table->string('thisweek_percentage');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('reports', function($table)
		{
		 	$table->renameColumn('lastweek_percentage', 'percentage');
		 	$table->dropColumn('thisweek_percentage');
		});
	}

}
