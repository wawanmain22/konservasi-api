<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tukik extends Model
{
    use HasFactory;

    protected $fillable = [
        'penetasan_id',
        'tanggal',
        'penyu_id',
        'status',
    ];

    // Relasi dengan model Penetasan
    public function penetasan()
    {
        return $this->belongsTo(Penetasan::class);
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
            'penetasan_id' => 'required|exists:penetasan,id',
            'tanggal' => 'required|date',
            'penyu_id' => 'required|exists:penyu,id',
            'status' => 'required|in:karantina,dilepaskan',
        ];
    }
}
