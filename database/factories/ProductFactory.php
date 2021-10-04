<?php

namespace Database\Factories;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Product::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => $this->faker->word,
            'vendor_id' => rand(1, 100),
            'category_id' => rand(1, 50),
            'sub_category_id' => rand(0, 100),
            'photo' => $this->faker->imageUrl($width = 640, $height = 480),
            'description' => $this->faker->paragraph($nbSentences = 50, $variableNbSentences = true),
            'current_price' => $this->faker->randomFloat($nbMaxDecimals = NULL, $min = 0, $max = 30000.00),
            'old_price' => $this->faker->randomFloat($nbMaxDecimals = NULL, $min = 0, $max = NULL),
            'qty' => rand(0, 1000)
        ];
    }
}
