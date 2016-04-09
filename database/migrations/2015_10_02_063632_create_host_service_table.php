<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHostServiceTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('host_services', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('host_id') ;
            $table->integer('service_id') ;
            $table->text('overided_value') ;
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('host_services') ;
    }
}
