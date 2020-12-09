<?php

namespace Database\Factories;

use App\Models\ImovelAddress;
use Illuminate\Database\Eloquent\Factories\Factory;

class ImovelAddressFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = ImovelAddress::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'imovel_id'=>1,
            'cep'=>$this->faker->postcode,
            'city'=>$this->faker->city,
            'neigh'=>$this->faker->name,
            'lat'=>$this->faker->latitude(-14,57),
            'long'=>$this->faker->longitude(-39,51)
        ];
    }
}
