<?php

namespace App\Repositories;

use App\Models\Pilihan;

class AdminRepository
{
    public function create(array $data)
    {
        return Pilihan::create($data);
    }

    public function findById(int $id)
    {
        return Pilihan::withCount([
            'suara as jumlah_setuju' => function ($q) {
                $q->where('suara', 'setuju');
            },
            'suara as jumlah_tidak_setuju' => function ($q) {
                $q->where('suara', 'tidak_setuju');
            },
            'suara as jumlah_netral' => function ($q) {
                $q->where('suara', 'netral');
            },
        ])->find($id);
    }

    public function update(Pilihan $pilihan, array $data)
    {
        $pilihan->update($data);

        return $pilihan;
    }

    public function delete(Pilihan $pilihan)
    {
        return $pilihan->delete();
    }

    public function jumlahSuara(int $idpilihan)
    {
        return Pilihan::withCount([
            'suara as setuju' => function ($q) {
                $q->where('suara', 'setuju');
            },
            'suara as tidak_setuju' => function ($q) {
                $q->where('suara', 'tidak_setuju');
            },
            'suara as netral' => function ($q) {
                $q->where('suara', 'netral');
            },
            'suara as total'
        ])->find($idpilihan);
    }
}