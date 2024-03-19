<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pelepasan extends Model
{
    use HasFactory;

    protected $fillable = [
        'tukik_id',
        'tanggal',
        'tukik_dilepas',
        'keterangan',
    ];

    // Relasi dengan model Tukik
    public function tukik()
    {
        return $this->belongsTo(Tukik::class);
    }

    // Validasi data yang masuk
    public static function validationRules()
    {
        return [
            'tukik_id' => 'required|exists:tukik,id',
            'tanggal' => 'required|date',
            'tukik_dilepas' => 'required|integer|min:0',
            'keterangan' => 'nullable|string',
        ];
    }
}
