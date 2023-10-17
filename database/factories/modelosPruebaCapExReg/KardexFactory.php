<?php

namespace Database\Factories\modelosPruebaCapExReg;

use App\Models\modelosPruebaCapExReg\Alumno;
use App\Models\modelosPruebaCapExReg\Kardex;
use App\Models\modelosPruebaCapExReg\CatMateria;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Kardex>
 */
class KardexFactory extends Factory
{
    protected $model = Kardex::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $id_alumnos = DB::table('alumno')->select('id_alumno')->get();
        $id_alumno = $this->faker->randomElement($id_alumnos)->id_alumno;

        $id_materias = DB::table('cat_materia')->select('cve_materia')->get();
        $id_materia = $this->faker->randomElement($id_materias)->cve_materia;

        return [
            'folio_kardex_lic' => $this->faker->unique()->numberBetween(1000, 9999),
            'id_alumno' => $id_alumno,
            'cve_materia' => $id_materia,
        ];
    }

}
