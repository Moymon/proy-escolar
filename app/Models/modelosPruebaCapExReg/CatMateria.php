<?php

namespace App\Models\modelosPruebaCapExReg;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CatMateria extends Model
{
    use HasFactory;

    protected $table = "cat_materia";
    protected $primaryKey = 'cve_materia';
    public $timestamps = false;

    protected $fillable=[
        'cve_materia',
        'cve_mat_uaslp',
        'cve_area',
        'nombre_ing'
    ];
}
