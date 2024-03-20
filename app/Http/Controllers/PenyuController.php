<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Penyu;
use Illuminate\Http\Request;
use App\Http\Resources\GetPenyuResource;
use App\Http\Resources\CreatePenyuResource;
use App\Http\Resources\UpdatePenyuResource;

class PenyuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        $penyus = Penyu::all();

        if ($penyus->isEmpty()) {
            return response()->json([
                'message' => 'No penyu found',
            ], 404);
        }

        return response()->json([
            'message' => 'List of all penyu',
            'data' => GetPenyuResource::collection($penyus),
        ]);
    }

    public function show($id)
    {
        // Temukan penyu berdasarkan id
        $penyu = Penyu::find($id);

        // Jika penyu tidak ditemukan, kembalikan response error
        if (!$penyu) {
            return response()->json([
                'message' => 'Penyu with the given ID does not exist',
            ], 404);
        }

        // Return response
        return response()->json([
            'message' => 'Penyu detail',
            'data' => new GetPenyuResource($penyu), // Menggunakan GetPenyuResource untuk menampilkan detail penyu
        ]);
    }

    public function store(Request $request)
    {
        // Validasi input data
        $request->validate(Penyu::validationRules());

        // Buat penyu baru
        $penyu = Penyu::create([
            'jenis_penyu' => $request->jenis_penyu,
        ]);

        // Atur created_at menggunakan Carbon
        $penyu->created_at = Carbon::now();
        $penyu->save();

        // Return response
        return response()->json([
            'message' => 'Penyu created successfully',
            'data' => new CreatePenyuResource($penyu),
        ], 201);
    }

    public function update(Request $request, $id)
    {
        // Validasi input data untuk pembaharuan
        $request->validate(Penyu::updateValidationRules($id));

        // Temukan penyu berdasarkan id
        $penyu = Penyu::find($id);

        // Jika penyu tidak ditemukan, kembalikan response error
        if (!$penyu) {
            return response()->json([
                'message' => 'Penyu with the given ID does not exist',
            ], 404);
        }

        // Update penyu
        $penyu->jenis_penyu = $request->jenis_penyu;
        $penyu->updated_at = Carbon::now(); // Menggunakan Carbon::now() untuk mendapatkan waktu saat ini
        $penyu->save();

        // Return response
        return response()->json([
            'message' => 'Penyu updated successfully',
            'data' => new UpdatePenyuResource($penyu),
        ]);
    }
    public function destroy($id)
    {
        // Temukan penyu berdasarkan id
        $penyu = Penyu::find($id);

        // Jika penyu tidak ditemukan, kembalikan response error
        if (!$penyu) {
            return response()->json([
                'message' => 'Penyu with the given ID does not exist',
            ], 404);
        }

        // Hapus penyu
        $penyu->delete();

        // Return response
        return response()->json([
            'message' => 'Penyu deleted successfully',
        ]);
    }


}
