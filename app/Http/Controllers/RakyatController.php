<?php

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;
use App\Handlers\RakyatHandler;
use App\Http\Requests\SuaraRequest;
use App\Http\Requests\UpdateSuaraRequest;
use Exception;

class RakyatController extends Controller
{
    protected RakyatHandler $handler;

    public function __construct(RakyatHandler $handler)
    {
        $this->handler = $handler;
    }

    public function berisuara(
        SuaraRequest $request,
        $idpilihan
    ): JsonResponse
    {
        try {

            $suara = $this->handler->berisuara(
                $request->validated(),
                $idpilihan
            );

            return created(
                $suara,
                'Berhasil memberikan suara'
            );

        } catch (Exception $e) {

            return serverError(
                'Gagal memberikan suara',
                $e->getMessage()
            );

        }
    }

    public function lihatsuara(): JsonResponse
    {
        try {

            $suara = $this->handler->lihatsuara();

            return ok(
                $suara,
                'Berhasil mengambil data suara'
            );

        } catch (Exception $e) {

            return serverError(
                'Gagal mengambil data suara',
                $e->getMessage()
            );

        }
    }

    public function updatesuara(
        UpdateSuaraRequest $request,
        $idsuara
    ): JsonResponse
    {
        try {

            $suara = $this->handler->updatesuara(
                $idsuara,
                $request->validated()
            );

            if (!$suara) {
                return notFound('Suara tidak ditemukan');
            }

            return ok(
                $suara,
                'Suara berhasil diperbarui'
            );

        } catch (Exception $e) {

            return serverError(
                'Gagal memperbarui suara',
                $e->getMessage()
            );

        }
    }

    public function deletesuara($idsuara): JsonResponse
    {
        try {

            $deleted = $this->handler->deletesuara($idsuara);

            if (!$deleted) {
                return notFound('Suara tidak ditemukan');
            }

            return ok(
                null,
                'Suara berhasil dihapus'
            );

        } catch (Exception $e) {

            return serverError(
                'Gagal menghapus suara',
                $e->getMessage()
            );

        }
    }
}