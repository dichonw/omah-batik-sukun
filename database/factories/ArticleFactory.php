<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class ArticleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

    protected $model = ArticleModel::class;

    public function definition(): array
    {
        return [
            'article_title' => $this->faker->article_title,
            'image' => $this->faker->image,
            'description' => $this->faker->description,
            'optional-link' => $this->faker->optional,
        ];
    }
}
