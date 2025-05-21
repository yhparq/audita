<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Estudiante extends Model
{
    //

    protected $fillable = [
        'user_id',
        'nombres',
        'apellidos',
        'dni',
        'telefono',
        'correo',
        'institucion',
        'tipo',
        'codigo_operacion',
        'voucher_pago',
        'estado'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
