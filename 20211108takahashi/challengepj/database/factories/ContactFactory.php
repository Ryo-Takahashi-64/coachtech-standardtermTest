<?php

namespace Database\Factories;

use App\Models\Concact;
use Illuminate\Database\Eloquent\Factories\Factory;

class ContactFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'fullname' => $this->faker->name,
            'gender' => $this->faker->randomElement([1,2]),
            'email' => $this->faker->safeEmail,
            'postcode' => $this->faker->regexify('[0-9]{3}-[0-9]{4}'),
            'address' => $this->faker->address,
            'building_name' => $this->faker->word,
            'opinion' => $this->faker->realText(120),
        ];
    }
}
