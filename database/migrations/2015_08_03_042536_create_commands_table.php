<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCommandsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('commands', function(Blueprint $table)
        {
            $table->string('object_uuid', 128);
            $table->string('command_line', 1024);
            $table->timestamps();

            $table->primary('object_uuid');

            $table->foreign('object_uuid')
                ->references('uuid')->on('objects')
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
        Schema::drop('commands');
    }
}
