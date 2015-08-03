<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateObjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('objects', function(Blueprint $table)
        {
            $table->string('uuid', 128);
            $table->smallInteger('object_type');
            $table->string('first_name', 128);
            $table->string('second_name', 128)->nullable();
            $table->smallInteger('is_active');
            $table->timestamps();

            $table->primary('uuid');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('objects');
    }
}
