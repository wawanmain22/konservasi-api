<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PosController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

// Route untuk melihat seluruh data pos
Route::get('/pos', [PosController::class, 'index']);

// Route untuk menyimpan data pos baru
Route::post('/pos', [PosController::class, 'store']);

// Route untuk melihat detail data pos berdasarkan ID
Route::get('/pos/{id}', [PosController::class, 'show']);

// Route untuk mengupdate data pos berdasarkan ID
Route::put('/pos/{id}', [PosController::class, 'update']);

// Route untuk menghapus data pos berdasarkan ID
Route::delete('/pos/{id}', [PosController::class, 'destroy']);
