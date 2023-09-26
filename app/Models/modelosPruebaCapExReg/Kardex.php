<?php

namespace App\Models\modelosPruebaCapExReg;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kardex extends Model
{
    use HasFactory;

    protected $table = "kardex_lic";
    protected $primaryKey = 'folio_kardex_lic';
    public $timestamps = false;

    protected $fillable=[
        'folio_kardex_lic',
        'id_alumno',
        'cve_materia',
    ];
}
