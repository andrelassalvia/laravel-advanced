<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class CustomerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [

            'user_id'=> $this->faker->numberBetween(1, 11),
            'name' => $this->faker->name,
            'active' => random_int(0, 1)
            //
        ];
    }
}
