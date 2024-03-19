<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penyu extends Model
{
    use HasFactory;

    protected $fillable = [
        'jenis_penyu',
    ];

    // Validasi data yang masuk
    public static function validationRules()
    {
        return [
            'jenis_penyu' => 'required|string|unique:penyu,jenis_penyu',
        ];
    }
}
