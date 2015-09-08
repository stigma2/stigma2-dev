<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Object extends Model
{
    protected $table = 'objects';
    protected $fillable = ['uuid', 'object_type', 'first_name', 'second_name', 'is_active'];
}
