<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PosController;
use App\Http\Controllers\PenyuController;

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


// Route untuk melihat seluruh data penyu
Route::get('/penyu', [PenyuController::class, 'index']);

// Route untuk menyimpan data penyu baru
Route::post('/penyu', [PenyuController::class, 'store']);

// Route untuk melihat detail data penyu berdasarkan ID
Route::get('/penyu/{id}', [PenyuController::class, 'show']);

// Route untuk mengupdate data penyu berdasarkan ID
Route::put('/penyu/{id}', [PenyuController::class, 'update']);

// Route untuk menghapus data penyu berdasarkan ID
Route::delete('/penyu/{id}', [PenyuController::class, 'destroy']);
