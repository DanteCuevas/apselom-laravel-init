<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name'          => $this->faker->word(),
            'description'   => $this->faker->sentence(),
            'stock'         => $this->faker->randomNumber(3, false),
            'status'        => $this->faker->randomElement([true , false])
        ];
    }
}
