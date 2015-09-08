<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Command extends Model
{
    protected $table = 'commands';
    protected $fillable = ['object_uuid', 'command_line'];
}
