<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PosController;
use App\Http\Controllers\PenyuController;
use App\Http\Controllers\PendaratanController;
use App\Http\Controllers\PersemaianController;

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


// Route untuk melihat seluruh data pendaratan
Route::get('/pendaratan', [PendaratanController::class, 'index']);

// Route untuk menyimpan data pendaratan baru
Route::post('/pendaratan', [PendaratanController::class, 'store']);

// Route untuk melihat detail data pendaratan berdasarkan ID
Route::get('/pendaratan/{id}', [PendaratanController::class, 'show']);

// Route untuk mengupdate data pendaratan berdasarkan ID
Route::put('/pendaratan/{id}', [PendaratanController::class, 'update']);

// Route untuk melihat seluruh data persemaian
Route::get('/persemaian', [PersemaianController::class, 'index']);

// Route untuk menyimpan data persemaian baru
Route::post('/persemaian', [PersemaianController::class, 'store']);

// Route untuk melihat detail data persemaian berdasarkan ID
Route::get('/persemaian/{id}', [PersemaianController::class, 'show']);

// Route untuk mengupdate data persemaian berdasarkan ID
Route::put('/persemaian/{id}', [PersemaianController::class, 'update']);
