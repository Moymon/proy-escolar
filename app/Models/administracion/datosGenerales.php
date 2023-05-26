<?php

namespace App\Models\administracion;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class datosGenerales extends Model
{
    use HasFactory;

    protected $fillable = [
        'institucion',
        'url',
        'version_git',
        'nombre_version',
        'correo',
        'telefono',
        'ext',
        'master',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    
}
