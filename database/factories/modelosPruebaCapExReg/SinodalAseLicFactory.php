<?php

namespace Database\Factories\modelosPruebaCapExReg;

use App\Models\modelosPruebaCapExReg\SinodalAseLic;
use Illuminate\Database\Eloquent\Factories\Factory;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\SinodalAseLic>
 */
class SinodalAseLicFactory extends Factory
{
    protected $model = SinodalAseLic::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'folio_ase_lic' => $this->faker->unique()->numberBetween(1000, 9999),
            'nombre' =>  $this->faker->name,
            'rpe_sinodal' =>  $this->faker->numberBetween(1000, 9999),
        ];
    }
}
