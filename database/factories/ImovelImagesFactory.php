<?php

namespace Database\Factories;

use App\Models\ImovelImages;
use Illuminate\Database\Eloquent\Factories\Factory;

class ImovelImagesFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = ImovelImages::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'imovel_id'=>1,
            'url'=>$this->faker->realText($maxNbChars=20)
        ];
    }
}
