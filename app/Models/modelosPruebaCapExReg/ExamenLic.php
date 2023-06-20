<?php

namespace App\Models\modelosPruebaCapExReg;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExamenLic extends Model
{
    use HasFactory;

    protected $table = "examen_lic";
    protected $primaryKey = 'folio_exa_lic';
    public $timestamps = false;

    protected $fillable=[
        'folio_exa_lic',
        'cve_materia',
        'tipo',
        'hora',
        'fecha',
        'folio_ase_lic',
    ];
}
