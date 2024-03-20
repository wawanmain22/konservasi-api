<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penyu extends Model
{
    use HasFactory;

    protected $table = 'penyu';

    public $timestamps = false;

    protected $fillable = [
        'jenis_penyu',
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

    // Validasi data yang masuk untuk penambahan
    public static function validationRules()
    {
        return [
            'jenis_penyu' => 'required|string|unique:penyu,jenis_penyu',
        ];
    }

    // Validasi data yang masuk untuk pembaharuan
    public static function updateValidationRules($id)
    {
        return [
            'jenis_penyu' => 'required|string|unique:penyu,jenis_penyu,' . $id,
        ];
    }
}
