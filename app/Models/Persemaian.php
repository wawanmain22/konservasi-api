<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Persemaian extends Model
{
    use HasFactory;

    protected $fillable = [
        'pendaratan_id',
        'penyu_id',
        'tanggal',
        'no_sarang',
        'jumlah_telur',
        'keterangan',
    ];

    // Relasi dengan model Pendaratan
    public function pendaratan()
    {
        return $this->belongsTo(Pendaratan::class);
    }

    // Relasi dengan model Penyu
    public function penyu()
    {
        return $this->belongsTo(Penyu::class);
    }

    // Validasi data yang masuk
    public static function validationRules()
    {
        return [
            'pendaratan_id' => 'required|exists:pendaratan,id',
            'penyu_id' => 'required|exists:penyu,id',
            'tanggal' => 'required|date',
            'no_sarang' => 'required|integer|unique:persemaian,no_sarang',
            'jumlah_telur' => 'required|integer',
            'keterangan' => 'nullable|string',
        ];
    }
}
