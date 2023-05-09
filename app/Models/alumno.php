<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class alumno extends Model
{
    use HasFactory;

    protected $table = "alumno";

    protected $fillable=[
        'id_alumno',
        'cve_unica',
        'nombre',
        'nombres',
        'paterno',
        'materno',
        'conducta',
        'calle',
        'num_ext',
        'num_int',
        'colonia',
        'codigo_postal',
        'ciudad',
        'estado',
        'curp',
        'correo_uaslp',
        'correo_alterno',
        'telefono',
        'celular',
        'genero',
        'fecha_nace',
        'secundaria',
        'cve_prepa',
        'nss',
        'archivo_nss',
        'fecha_registro_nss'
    ];
}
