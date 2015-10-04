<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateServices extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('services', function (Blueprint $table) {
			$table->increments('id');
            $table->string('service_name')->index()->unique(); // is linked to description in services.cfg

            $table->integer('command_id')->nullable() ;
            $table->string('command_argument')->nullable() ;

            $table->string('service_description') ;
            $table->string('template_ids') ;
            $table->string('is_template') ;
            $table->text('data');
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
        Schema::drop('services');
    }
}
