<?php

namespace Database\Factories;


use App\Models\Produto;
use Illuminate\Database\Eloquent\Factories\Factory;
use Faker\Generator as Faker;

class ProdutoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nome' => $this->faker->word,
            'preco' => $this->faker->randomFloat(2, 10, 100),
            'marca' => $this->faker->word,
            'quantidade' => $this->faker->numberBetween(1, 100),
        ];
    }
}
