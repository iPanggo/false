<?php

namespace App\Interfaces;

interface AuthInterface
{
    public function create(array $data);

    public function findBynisn_nip(string $data);
   
}