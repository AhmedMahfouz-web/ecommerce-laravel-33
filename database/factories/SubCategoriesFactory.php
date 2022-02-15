<?php

namespace Database\Factories;

use App\Models\SubCategories;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class SubCategoriesFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = SubCategories::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $abbr = ['en', 'ar', 'fr', 'es'];
        $name = str_replace('.', '', $this->faker->word($nb = rand(1, 3)));
        return [
            'translation_lang' => $abbr[array_rand($abbr)],
            'category_id' => rand(1, 50),
            'parent_id' => rand(0, 100),
            'translation_of' => rand(0, 100),
            'name' => Str::ucfirst($name),
            'slug' => str_replace(' ', '-', strtolower($name)),
            'photo' => 'images/main_category/FXFYIsjgsirlC9AvKjYYXNdQFPrtKIwPWhCL6PZv.png',
            'active' => rand(0, 1)
        ];
    }
}
