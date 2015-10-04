<?php
namespace Stigma\ObjectManager\Models ;

class Host extends \Eloquent
{
    protected $guarded = [] ;
    protected $fillable = [
        'host_name',
        'description',
        'template_name',
        'template_ids',
        'command_id',
        'command_argument',
        'service_ids',
        'alias',
        'is_template',
        'address',
        'data'
        ];

    public function services()
    {
        return $this->belongsToMany('Stigma\ObjectManager\Models\Service','host_services','host_id','service_id') ;
    }
}
