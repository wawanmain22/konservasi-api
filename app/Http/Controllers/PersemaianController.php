<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Persemaian;
use Illuminate\Http\Request;
use App\Http\Resources\GetPersemaianResource;
use App\Http\Resources\CreatePersemaianResource;
use App\Http\Resources\UpdatePersemaianResource;

class PersemaianController extends Controller
{
    public function index()
    {
        // Ambil semua data persemaian
        $persemaians = Persemaian::all();

        // Jika tidak ada data persemaian
        if ($persemaians->isEmpty()) {
            return response()->json([
                'message' => 'No persemaians found',
            ], 404);
        }

        // Jika ada data persemaian, kembalikan response dengan data persemaian
        return response()->json([
            'message' => 'List of all persemaians',
            'data' => GetPersemaianResource::collection($persemaians),
        ]);
    }

    public function show($id)
    {
        // Temukan persemaian berdasarkan id
        $persemaian = Persemaian::find($id);

        // Jika persemaian tidak ditemukan, kembalikan response error
        if (!$persemaian) {
            return response()->json([
                'message' => 'Persemaian with the given ID does not exist',
            ], 404);
        }

        // Return response
        return response()->json([
            'message' => 'Persemaian detail',
            'data' => new GetPersemaianResource($persemaian), // Menggunakan GetPersemaianResource untuk menampilkan detail persemaian
        ]);
    }

    public function store(Request $request)
    {
        // Validasi input data menggunakan aturan validasi dari model Persemaian
        $request->validate(Persemaian::validationRules());

        // Buat instance Persemaian baru
        $persemaian = new Persemaian();
        $persemaian->pendaratan_id = $request->pendaratan_id;
        $persemaian->penyu_id = $request->penyu_id;
        $persemaian->tanggal = $request->tanggal;
        $persemaian->no_sarang = $request->no_sarang;
        $persemaian->jumlah_telur = $request->jumlah_telur;
        $persemaian->keterangan = $request->keterangan;
        $persemaian->created_at = Carbon::now(); // Set created_at menggunakan Carbon::now()

        // Simpan Persemaian baru
        $persemaian->save();

        // Return response
        return response()->json([
            'message' => 'Persemaian created successfully',
            'data' => new CreatePersemaianResource($persemaian),
        ], 201);
    }

    public function update(Request $request, $id)
    {
        // Temukan persemaian berdasarkan id
        $persemaian = Persemaian::find($id);

        // Jika persemaian tidak ditemukan, kembalikan response error
        if (!$persemaian) {
            return response()->json([
                'message' => 'Persemaian with the given ID does not exist',
            ], 404);
        }

        // Validasi input data untuk pembaharuan
        $request->validate(Persemaian::validationRules());

        // Update persemaian
        $persemaian->pendaratan_id = $request->pendaratan_id;
        $persemaian->penyu_id = $request->penyu_id;
        $persemaian->tanggal = $request->tanggal;
        $persemaian->no_sarang = $request->no_sarang;
        $persemaian->jumlah_telur = $request->jumlah_telur;
        $persemaian->keterangan = $request->keterangan;
        $persemaian->updated_at = now(); // Menggunakan now() untuk mendapatkan waktu saat ini
        $persemaian->save();

        // Return response
        return response()->json([
            'message' => 'Persemaian updated successfully',
            'data' => new UpdatePersemaianResource($persemaian),
        ]);
    }

}
