<?php

namespace Database\Factories;

use App\Models\Category;
use App\Enums\Category\CategoryStatus;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Category>
 */
class CategoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => [
                'ar' => fake()->unique()->word(),
                'en' => fake()->unique()->word()
            ],

            'slug' => [
                'ar' => fake()->unique()->slug(),
                'en' => fake()->unique()->slug()
            ],
            'status' => CategoryStatus::random(),
            'parent_id' => Category::count() > 1 ? Category::pluck('id')->push(null)->random() : null,
        ];
    }
}