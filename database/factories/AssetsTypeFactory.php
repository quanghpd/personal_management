<?php

namespace Database\Factories;

use App\AssetsType;
use Illuminate\Database\Eloquent\Factories\Factory;

class AssetsTypeFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = AssetsType::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->word,
        ];
    }
}
