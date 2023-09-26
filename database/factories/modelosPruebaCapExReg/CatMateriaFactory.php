<?php

namespace Database\Factories\modelosPruebaCapExReg;

use App\Models\modelosPruebaCapExReg\CatMateria;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\CatMateria>
 */
class CatMateriaFactory extends Factory
{
    protected $model = CatMateria::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'cve_materia' => $this->faker->unique()->regexify('[A-Z0-9]{6}'),
            'cve_mat_uaslp' => $this->faker->regexify('[A-Z0-9]{10}'),
            'cve_area' => $this->faker->regexify('[A-Z0-9]{3}'),
            'nombre_ing' => $this->faker->sentence(1),
        ];
    }
}
