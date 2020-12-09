<?php

namespace Database\Factories;

use App\Models\Imoveis;
use Illuminate\Database\Eloquent\Factories\Factory;

class ImoveisFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Imoveis::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title'=>$this->faker->name,
            'desc'=>$this->faker->realText($maxNbChars=200),
            'type'=>$this->faker->realText($maxNbChars=10),
            'dorms'=>$this->faker->randomDigit,
            'price'=>$this->faker->randomFloat(),
        ];
    }
}
