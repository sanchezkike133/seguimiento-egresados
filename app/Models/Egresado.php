<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Egresado extends Model
{
    use HasFactory;

    protected $fillable = [
        'matricula',
        'nombre_completo',
        'carrera',
        'generacion',
        'estatus',
        'domicilio',
        'genero',
        'telefono',
        'email',
    ];
}
