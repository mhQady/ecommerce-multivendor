<?php

namespace Database\Factories;

use App\Models\Brand;
use App\Models\Vendor;
use App\Enums\Product\ProductType;
use App\Enums\Product\ProductStatus;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
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
                'ar' => fake()->word(),
                'en' => fake()->word(),
            ],
            'slug' => [
                'ar' => fake()->slug(),
                'en' => fake()->slug(),
            ],
            // 'sub_title' => [
            //     'ar' => fake()->sentence(),
            //     'en' => fake()->sentence(),
            // ],
            // 'marketing_title' => [
            //     'ar' => fake()->sentence(),
            //     'en' => fake()->sentence(),
            // ],
            'description' => [
                'ar' => fake()->paragraph(),
                'en' => fake()->paragraph()
            ],
            'status' => ProductStatus::random(),
            'type' => ProductType::random(),
            // 'stock' => fake()->numberBetween('100', '9999'),
            // 'cost_price' => fake()->numberBetween('1', '1000'),
            // 'price' => fake()->numberBetween('5', '5000'),
            // 'sales_count' => rand(0, 1000),
            // 'allow_order_quantity' => rand(1, 2),
            // 'min_order_quantity' => rand(1, 5),
            // 'max_order_quantity' => rand(5, 100),
            'brand_id' => Brand::inRandomOrder()->first(),
            'vendor_id' => Vendor::inRandomOrder()->first(),
            // 'discount_id' => Discount::inRandomOrder()->first(),
        ];
    }
}