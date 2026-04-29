<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class VentaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'producto' => $this->faker->producto(),
            'cantidad' => $this->faker->cantidad(),
            'precio' => $this->faker->precio(),
            'total' => $this->faker->total(),
        ];
    }
}
