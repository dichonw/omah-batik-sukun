<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

    protected $model = ProductModel::class;

    public function definition()
    {
        return [
            'product_name' => $this->faker->name,
            'image' => $this->faker->name_image,
            'price' => $this->faker->price,
            'discount' => $this->faker->random_int,
            'description' => $this->faker->description,
        ];
    }
}
