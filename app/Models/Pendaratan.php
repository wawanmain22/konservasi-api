<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pendaratan extends Model
{
    use HasFactory;

    protected $table = 'pendaratan';

    public $timestamps = false;

    protected $fillable = [
        'pos_id',
        'tanggal',
        'jam_mendarat',
        'mendarat_bertelur',
        'mendarat_tdk_bertelur',
        'jumlah_telur',
        'keterangan',
    ];

    // Relasi dengan model Pos
    public function pos()
    {
        return $this->belongsTo(Pos::class);
    }

    // Validasi data yang masuk
    public static function validationRules()
    {
        return [
            'pos_id' => 'required|exists:pos,id',
            'tanggal' => 'required|date',
            'jam_mendarat' => 'required|date_format:H:i',
            'mendarat_bertelur' => 'required|integer',
            'mendarat_tdk_bertelur' => 'required|integer',
            'jumlah_telur' => 'required|integer',
            'keterangan' => 'nullable|string',
        ];
    }
}
