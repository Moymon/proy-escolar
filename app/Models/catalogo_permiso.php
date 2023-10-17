<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class catalogo_permiso extends Model
{
    use HasFactory;

    protected $table = "catalogo_permiso";

    protected $fillable = [
        'id_permiso',
        'id_modulo_c',
        'descripcion',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    
}
