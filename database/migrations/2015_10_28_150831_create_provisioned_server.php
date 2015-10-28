<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProvisionedServer extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('provisioned_server', function(Blueprint $table)
		{
			$table->increments('id');
	        $table->string('public_dns') ;
	        $table->string('security_group') ;
	        $table->string('region') ;
            $table->timestamps() ;
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('provisioned_server');
	}

}
