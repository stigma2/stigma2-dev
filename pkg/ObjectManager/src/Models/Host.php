<?php
namespace Stigma\ObjectManager\Models ;

class Host extends \Eloquent
{
    protected $guarded = [] ;

    public function services()
    {
        return $this->belongsToMany('Stigma\ObjectManager\Models\Service','host_services','host_id','service_id') ;
    }
}
