<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHosts extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hosts', function (Blueprint $table) {
			$table->increments('id');
            $table->string('host_name')->index()->unique();
            $table->string('is_immutable')->default('N')->nullable() ;
            $table->string('description') ;
            $table->integer('command_id')->nullable() ;
            $table->string('command_argument')->nullable() ;
            $table->string('template_ids') ;
            $table->string('service_ids') ;
            $table->string('template_name')->unique() ; //name for using as template 
            $table->string('alias')->index()->unique() ;
            $table->string('is_template') ;
            $table->string('address') ;
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
        Schema::drop('hosts');
    }
}
