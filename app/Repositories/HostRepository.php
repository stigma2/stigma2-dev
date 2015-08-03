<?php

namespace App\Repositories;

use App\Interfaces\HostInterface;
use App\Host;

/**
 * Host repository.
 */
class HostRepository implements HostInterface
{
    /**
     * @var Host $host
     */
    private $host;

    /**
     * Set the dependencies.
     *
     * @param Host $host
     * @return void
     */
    public function __construct(Host $host)
    {
        $this->host = $host;
    }

    public function lists()
    {
        return array(
                array("host_name" => "host 1"),
                array("host_name" => "host 2"),
                array("host_name" => "host 3"),
                array("host_name" => "host 4"),
                array("host_name" => "host 5"),
                array("host_name" => "host 6"),
            );
    }

    public function save(array $array)
    {
        //
    }

    public function find($uuid)
    {
        //
    }

    public function modify($uuid)
    {
        //
    }

    public function remove($uuid)
    {
        //
    }
}
