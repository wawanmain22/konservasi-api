<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Pos;
use Illuminate\Http\Request;
use App\Http\Resources\GetPosResource;
use App\Http\Resources\CreatePosResource;
use App\Http\Resources\UpdatePosResource;

class PosController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        $positions = Pos::all();

        return response()->json([
            'message' => 'List of all positions',
            'data' => GetPosResource::collection($positions),
        ]);
    }

    public function show($id)
    {
        // Temukan pos berdasarkan id
        $pos = Pos::findOrFail($id);

        // Return response
        return response()->json([
            'message' => 'Pos detail',
            'data' => new GetPosResource($pos), // Menggunakan GetPosResource untuk menampilkan detail pos
        ]);
    }

    public function store(Request $request)
    {
        // Validasi input data
        $request->validate(Pos::validationRules());

        // Buat pos baru dan atur created_at menggunakan Carbon
        $pos = new Pos;
        $pos->nama_pos = $request->nama_pos;
        $pos->latitude = $request->latitude;
        $pos->longitude = $request->longitude;
        $pos->created_at = Carbon::now(); // Menggunakan Carbon::now() untuk mendapatkan waktu saat ini
        $pos->save();

        // Return response
        return response()->json([
            'message' => 'Pos created successfully',
            'data' => new CreatePosResource($pos),
        ], 201);
    }

    public function update(Request $request, $id)
    {
        // Validasi input data untuk pembaharuan
        $request->validate(Pos::updateValidationRules($id));

        // Temukan pos berdasarkan id
        $pos = Pos::findOrFail($id);

        // Update pos
        $pos->nama_pos = $request->nama_pos;
        $pos->latitude = $request->latitude;
        $pos->longitude = $request->longitude;
        $pos->updated_at = Carbon::now(); // Menggunakan Carbon::now() untuk mendapatkan waktu saat ini
        $pos->save();

        // Return response
        return response()->json([
            'message' => 'Pos updated successfully',
            'data' => new UpdatePosResource($pos),
        ]);
    }

    public function destroy($id)
    {
        // Temukan pos berdasarkan id
        $pos = Pos::findOrFail($id);

        // Hapus pos
        $pos->delete();

        // Return response
        return response()->json([
            'message' => 'Pos deleted successfully',
        ]);
    }



}
