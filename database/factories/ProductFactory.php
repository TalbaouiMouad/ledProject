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
            'product_name'=>$this->faker->name(),
            'long_description'=>$this->faker->paragraphs($nb=2,$variableNbSentences=true),
            'small_description'=>$this->faker->sentence(),
            'product_price'=>$this->faker->numberBetween($min=100,$max=10000),
            'product_amount'=>$this->faker->numberBetween($min=2,$max=200),
            'product_publish'=>$this->faker->randomElement([0,1]),
            'photo'=>$this->faker->imageUrl('cats')
        ];
    }
}
