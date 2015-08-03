<?php

namespace App\Interfaces;

/**
 * Interface for repositories.
 */
interface RepositoryInterface
{
    public function lists();

    public function save(array $array);

    public function find($uuid);

    public function modify($uuid);

    public function remove($uuid);
}
