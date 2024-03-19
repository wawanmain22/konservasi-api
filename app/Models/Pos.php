<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pos extends Model
{
    use HasFactory;

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */

    public $timestamps = false;

    protected $fillable = [
        'nama_pos',
        'latitude',
        'longitude',
    ];

    // Relasi dengan model Pendaratan
    public function pendaratan()
    {
        return $this->hasMany(Pendaratan::class);
    }

    // Relasi dengan model Penetasan
    public function penetasan()
    {
        return $this->hasManyThrough(Penetasan::class, Pendaratan::class);
    }

    // Validasi data yang masuk
    public static function validationRules()
    {
        return [
            'nama_pos' => 'required|string|unique:pos,nama_pos',
            'latitude' => 'required|string',
            'longitude' => 'required|string',
        ];
    }

    public static function updateValidationRules($id)
    {
        return [
            'nama_pos' => 'required|string|unique:pos,nama_pos,' . $id,
            'latitude' => 'required|string',
            'longitude' => 'required|string',
        ];
    }
}

