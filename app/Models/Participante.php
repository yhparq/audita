<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Participante extends Model
{

    protected $fillable = [
        'nombres',
        'apellidos',
        'dni',
        'telefono',
        'correo',
        'institucion',
        'tipo',
        'codigo_operacion',
        'voucher_pago',
        'estado',
        'departamento',
        'provincia',
        'distrito',
        'direccion',
    ];
}
