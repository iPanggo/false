<?php

namespace App\Handlers;

use App\Repositories\RakyatRepository;

class RakyatHandler
{
    protected RakyatRepository $repository;

    public function __construct(RakyatRepository $repository)
    {
        $this->repository = $repository;
    }

    public function berisuara(array $data, int $idpilihan)
    {
        return $this->repository->create([
            'idpilihan' => $idpilihan,
            'suara' => $data['suara'],
        ]);
    }

    public function lihatsuara()
    {
        return $this->repository->getAll();
    }

    public function updatesuara(int $idsuara, array $data)
    {
        $suara = $this->repository->findById($idsuara);

        if (!$suara) {
            return null;
        }

        return $this->repository->update($suara, [
            'suara' => $data['suara'],
        ]);
    }

    public function deletesuara(int $idsuara)
    {
        $suara = $this->repository->findById($idsuara);

        if (!$suara) {
            return false;
        }

        return $this->repository->delete($suara);
    }
}