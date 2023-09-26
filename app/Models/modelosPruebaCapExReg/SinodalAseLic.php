<?php

namespace App\Models\modelosPruebaCapExReg;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SinodalAseLic extends Model
{
    use HasFactory;

    protected $table = "sinodal_ase_lic";
    protected $primaryKey = 'folio_ase_lic';
    public $timestamps = false;

    protected $fillable=[
        'folio_ase_lic',
        'nombre',
        'rpe_sinodal',
    ];
}
