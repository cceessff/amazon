<?php

namespace Database\Factories;

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
    public function definition()
    {
        return [
            "title" => fake()->sentence(4),
            "image" => "images/product/".fake()->image(storage_path("app/public/images/product"),640,480,null,false),
            "price" => fake()->randomFloat(2,100,999999),
            "level" => 1,
            "sale_nums" => 0,
            "description" => fake()->text(100),
            "sort" => 0,
            "status" => 1,
        ];
    }
}
