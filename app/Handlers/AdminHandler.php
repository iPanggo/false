<?php

namespace App\Handlers;

use App\Repositories\AdminRepository;

class AdminHandler
{
    protected AdminRepository $repository;

    public function __construct(AdminRepository $repository)
    {
        $this->repository = $repository;
    }

    public function buatpilihan(array $data)
    {
        return $this->repository->create([
            'name' => $data['name'],
            'description' => $data['description'] ?? null,
        ]);
    }

    public function lihatpilihan(int $id)
    {
        return $this->repository->findById($id);
    }

    public function updatepilihan(int $id, array $data)
    {
        $pilihan = $this->repository->findById($id);

        if (!$pilihan) {
            return null;
        }

        return $this->repository->update($pilihan, [
            'name' => $data['name'] ?? $pilihan->name,
            'description' => $data['description'] ?? $pilihan->description,
        ]);
    }

    public function deletepilihan(int $id)
    {
        $pilihan = $this->repository->findById($id);

        if (!$pilihan) {
            return false;
        }

        return $this->repository->delete($pilihan);
    }

    public function lihatjumlahsuara(int $idpilihan)
    {
        $pilihan = $this->repository->jumlahSuara($idpilihan);

        if (!$pilihan) {
            return null;
        }

        return [
            'setuju' => $pilihan->setuju,
            'tidak_setuju' => $pilihan->tidak_setuju,
            'netral' => $pilihan->netral,
            'total' => $pilihan->total,
        ];
    }
}