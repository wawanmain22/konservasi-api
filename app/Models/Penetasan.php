<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penetasan extends Model
{
    use HasFactory;

    protected $fillable = [
        'persemaian_id',
        'penyu_id',
        'jmlh_telur_menetas',
        'jmlh_telur_tdk_menetas',
        'jmlh_tukik_hidup',
        'jmlh_tukik_mati',
        'lama_inkubasi',
        'keterangan',
    ];

    // Relasi dengan model Persemaian
    public function persemaian()
    {
        return $this->belongsTo(Persemaian::class);
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
            'persemaian_id' => 'required|exists:persemaian,id',
            'penyu_id' => 'required|exists:penyu,id',
            'jmlh_telur_menetas' => 'required|integer',
            'jmlh_telur_tdk_menetas' => 'required|integer',
            'jmlh_tukik_hidup' => 'required|integer',
            'jmlh_tukik_mati' => 'required|integer',
            'lama_inkubasi' => 'required|date',
            'keterangan' => 'nullable|string',
        ];
    }
}
