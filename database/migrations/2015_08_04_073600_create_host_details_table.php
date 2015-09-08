<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHostDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('host_details', function(Blueprint $table)
        {
            $table->increments('id');
            $table->string('host_fk', 128);
            $table->string('key', 128);
            $table->string('value', 1024);
            $table->timestamps();

            $table->foreign('host_fk')
                ->references('object_uuid')->on('hosts')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('host_details');
    }
}
