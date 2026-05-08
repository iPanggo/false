<?php

namespace App\Repositories;

use App\Models\Suara;

class RakyatRepository
{
    public function create(array $data)
    {
        return Suara::create($data);
    }

    public function getAll()
    {
        return Suara::with('pilihan')
            ->latest()
            ->get();
    }

    public function findById(int $idsuara)
    {
        return Suara::with('pilihan')
            ->find($idsuara);
    }

    public function update(Suara $suara, array $data)
    {
        $suara->update($data);

        return $suara;
    }

    public function delete(Suara $suara)
    {
        return $suara->delete();
    }
}