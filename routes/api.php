<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\RakyatController;
use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;

Route::post('/login', [AuthController::class, 'login']);
Route::post('/register', [AuthController::class, 'register']);

Route::middleware('auth:sanctum')->group(function () {

        Route::post(
            'pilihan',
            [AdminController::class, 'buatpilihan']
        );

        Route::get(
            'pilihan/{id}',
            [AdminController::class, 'lihatpilihan']
        );

        Route::put(
            'pilihan/{id}',
            [AdminController::class, 'updatepilihan']
        );

        Route::delete(
            'pilihan/{id}',
            [AdminController::class, 'deletepilihan']
        );

        // jumlah suara
        Route::get(
            'jumlah-suara/{idpilihan}',
            [AdminController::class, 'lihatjumlahsuara']
        );

        Route::post(
            'suara/{idpilihan}',
            [RakyatController::class, 'berisuara']
        );

        // lihat semua suara
        Route::get(
            'suara',
            [RakyatController::class, 'lihatsuara']
        );

        // update suara
        Route::put(
            'suara/{idsuara}',
            [RakyatController::class, 'updatesuara']
        );

        // hapus suara
        Route::delete(
            'suara/{idsuara}',
            [RakyatController::class, 'deletesuara']
        );
    });
