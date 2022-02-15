<?php

namespace Database\Factories;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

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
        $title = $this->faker->word($nb = rand(4, 15));
        return [
            'title' => Str::ucfirst($title),
            'slug' => str_replace(' ', '-', strtolower($title)),
            'vendor_id' => rand(1, 100),
            'category_id' => rand(1, 50),
            'sub_category_id' => rand(0, 100),
            'photo' => $this->faker->imageUrl($width = 550, $height = 750, $category = 'shop'),
            'description' => $this->faker->paragraph($nbSentences = 50, $variableNbSentences = true),
            'current_price' => $this->faker->randomFloat($nbMaxDecimals = NULL, $min = 0, $max = 30000.00),
            'old_price' => $this->faker->randomFloat($nbMaxDecimals = NULL, $min = 0, $max = 999999.00),
            'qty' => rand(0, 1000)
        ];
    }
}
