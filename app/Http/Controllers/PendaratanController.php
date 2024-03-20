<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Pendaratan;
use Illuminate\Http\Request;
use App\Http\Resources\GetPendaratanResource;
use App\Http\Resources\CreatePendaratanResource;
use App\Http\Resources\UpdatePendaratanResource;

class PendaratanController extends Controller
{
    public function index()
    {
        // Ambil semua data pendaratan
        $pendaratans = Pendaratan::all();

        // Jika tidak ada data pendaratan
        if ($pendaratans->isEmpty()) {
            return response()->json([
                'message' => 'No pendaratans found',
            ], 404);
        }

        // Jika ada data pendaratan, kembalikan response dengan data pendaratan
        return response()->json([
            'message' => 'List of all pendaratans',
            'data' => GetPendaratanResource::collection($pendaratans),
        ]);
    }

    public function show($id)
    {
        // Temukan pendaratan berdasarkan id
        $pendaratan = Pendaratan::find($id);

        // Jika pendaratan tidak ditemukan, kembalikan response error
        if (!$pendaratan) {
            return response()->json([
                'message' => 'Pendaratan with the given ID does not exist',
            ], 404);
        }

        // Return response
        return response()->json([
            'message' => 'Pendaratan detail',
            'data' => new GetPendaratanResource($pendaratan), // Menggunakan GetPendaratanResource untuk menampilkan detail pendaratan
        ]);
    }

    public function store(Request $request)
    {
        // Validasi input data menggunakan aturan validasi dari model Pendaratan
        $request->validate(Pendaratan::validationRules());

        // Buat instance Pendaratan baru
        $pendaratan = new Pendaratan();
        $pendaratan->pos_id = $request->pos_id;
        $pendaratan->tanggal = $request->tanggal;
        $pendaratan->jam_mendarat = $request->jam_mendarat;
        $pendaratan->mendarat_bertelur = $request->mendarat_bertelur;
        $pendaratan->mendarat_tdk_bertelur = $request->mendarat_tdk_bertelur;
        $pendaratan->jumlah_telur = $request->jumlah_telur;
        $pendaratan->keterangan = $request->keterangan;
        $pendaratan->created_at = Carbon::now(); // Set created_at menggunakan Carbon::now()

        // Simpan Pendaratan baru
        $pendaratan->save();

        // Return response
        return response()->json([
            'message' => 'Pendaratan created successfully',
            'data' => new CreatePendaratanResource($pendaratan),
        ], 201);
    }

    public function update(Request $request, $id)
    {
        // Temukan pendaratan berdasarkan id
        $pendaratan = Pendaratan::find($id);

        // Jika pendaratan tidak ditemukan, kembalikan response error
        if (!$pendaratan) {
            return response()->json([
                'message' => 'Pendaratan with the given ID does not exist',
            ], 404);
        }

        // Validasi input data untuk pembaharuan
        $request->validate(Pendaratan::validationRules());

        // Update pendaratan
        $pendaratan->pos_id = $request->pos_id;
        $pendaratan->tanggal = $request->tanggal;
        $pendaratan->jam_mendarat = $request->jam_mendarat;
        $pendaratan->mendarat_bertelur = $request->mendarat_bertelur;
        $pendaratan->mendarat_tdk_bertelur = $request->mendarat_tdk_bertelur;
        $pendaratan->jumlah_telur = $request->jumlah_telur;
        $pendaratan->keterangan = $request->keterangan;
        $pendaratan->updated_at = now(); // Menggunakan now() untuk mendapatkan waktu saat ini
        $pendaratan->save();

        // Return response
        return response()->json([
            'message' => 'Pendaratan updated successfully',
            'data' => new UpdatePendaratanResource($pendaratan),
        ]);
    }


}
