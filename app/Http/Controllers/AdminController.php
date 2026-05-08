<?php

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;
use App\Handlers\AdminHandler;
use App\Http\Requests\PilihanRequest;
use App\Http\Requests\UpdatePilihanRequest;
use Exception;

class AdminController extends Controller
{
    protected AdminHandler $handler;

    public function __construct(AdminHandler $handler)
    {
        $this->handler = $handler;
    }

    public function buatpilihan(PilihanRequest $request): JsonResponse
    {
        try {

            $pilihan = $this->handler->buatpilihan(
                $request->validated()
            );

            return created($pilihan, 'Pilihan berhasil dibuat');

        } catch (Exception $e) {

            return serverError(
                'Gagal membuat pilihan',
                $e->getMessage()
            );

        }
    }

    public function lihatpilihan($id): JsonResponse
    {
        try {

            $pilihan = $this->handler->lihatpilihan($id);

            if (!$pilihan) {
                return notFound('Pilihan tidak ditemukan');
            }

            return ok($pilihan, 'Berhasil mengambil pilihan');

        } catch (Exception $e) {

            return serverError(
                'Gagal mengambil pilihan',
                $e->getMessage()
            );

        }
    }

    public function updatepilihan(
        UpdatePilihanRequest $request,
        $id
    ): JsonResponse
    {
        try {

            $pilihan = $this->handler->updatepilihan(
                $id,
                $request->validated()
            );

            if (!$pilihan) {
                return notFound('Pilihan tidak ditemukan');
            }

            return ok(
                $pilihan,
                'Pilihan berhasil diperbarui'
            );

        } catch (Exception $e) {

            return serverError(
                'Gagal memperbarui pilihan',
                $e->getMessage()
            );

        }
    }

    public function deletepilihan($id): JsonResponse
    {
        try {

            $deleted = $this->handler->deletepilihan($id);

            if (!$deleted) {
                return notFound('Pilihan tidak ditemukan');
            }

            return ok(null, 'Pilihan berhasil dihapus');

        } catch (Exception $e) {

            return serverError(
                'Gagal menghapus pilihan',
                $e->getMessage()
            );

        }
    }

    public function lihatjumlahsuara($idpilihan): JsonResponse
    {
        try {

            $jumlah = $this->handler->lihatjumlahsuara($idpilihan);

            return ok([
                'id_pilihan' => $idpilihan,
                'jumlah_suara' => $jumlah
            ], 'Berhasil mengambil jumlah suara');

        } catch (Exception $e) {

            return serverError(
                'Gagal mengambil jumlah suara',
                $e->getMessage()
            );

        }
    }
}