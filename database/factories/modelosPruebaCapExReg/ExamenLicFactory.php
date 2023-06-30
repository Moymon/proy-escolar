<?php

namespace Database\Factories\modelosPruebaCapExReg;

use App\Models\modelosPruebaCapExReg\ExamenLic;
use App\Models\modelosPruebaCapExReg\CatMateria;
use App\Models\modelosPruebaCapExReg\SinodalAseLic;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ExamenLic>
 */
class ExamenLicFactory extends Factory
{
    protected $model = ExamenLic::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $id_materias = DB::table('cat_materia')->select('cve_materia')->get();
        $id_materia = $this->faker->randomElement($id_materias)->cve_materia;

        $id_sinodales = DB::table('sinodal_ase_lic')->select('folio_ase_lic')->get();
        $id_sinodal = $this->faker->randomElement($id_sinodales)->folio_ase_lic;
        $fechas = [
            ['2018-01-01', '2018-01-05'],
            ['2018-07-01', '2018-07-05'],
            ['2019-01-01', '2019-01-05'],
            ['2019-07-01', '2019-07-05'],
            ['2020-01-01', '2020-01-05'],
            ['2020-07-01', '2020-07-05'],
            ['2021-01-01', '2021-01-05'],
            ['2021-07-01', '2021-07-05'],
            ['2022-01-01', '2022-01-05'],
            ['2022-07-01', '2022-07-05'],
            ['2023-01-01', '2023-01-05'],
            ['2023-07-01', '2023-07-05'],
            // Agrega más rangos de fechas según sea necesario
        ];

        $fecha = $this->faker->dateTimeBetween('2018-01-01', '2023-12-31')->format("Y-m-d");

        return [
            'folio_exa_lic' => $this->faker->unique()->numberBetween(1000, 9999),
            'tipo' => $tipo = $this->faker->randomElement(['ET', 'ER']),
            'hora' => $this->faker->numberBetween(1, 12),
            'salon' => $this->faker->numberBetween(1, 100),
            'fecha' => $this->faker->dateTimeBetween('2018-01-01', '2023-12-31')->format("Y-m-d"),
            'periodo' => $tipo === 'ET' ? 'EXAMENES A TITULO' : 'EXAMENES A REGULARIZACION',
            'folio_ase_lic' => $id_sinodal,
            'cve_materia' => $id_materia,

        ];
    }
}
