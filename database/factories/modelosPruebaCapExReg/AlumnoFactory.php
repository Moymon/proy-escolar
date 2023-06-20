<?php

namespace Database\Factories\modelosPruebaCapExReg;

use App\Models\modelosPruebaCapExReg\Alumno;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Alumno>
 */
class AlumnoFactory extends Factory
{
    protected $model = alumno::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()

    {

        return [
            'id_alumno' => $this->faker->unique()->regexify('[A-Z0-9]{12}'),
            'cve_unica' => $this->faker->regexify('[A-Z0-9]{7}'),
            'nombre' => $this->faker->firstName,
            'nombres' => $this->faker->firstName,
            'paterno' => $this->faker->lastName,
            'materno' => $this->faker->lastName,
        ];

    }
}
