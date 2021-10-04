<?php

namespace Database\Factories;

use App\Models\MainCategories;
use Illuminate\Database\Eloquent\Factories\Factory;

class MainCategoriesFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = MainCategories::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $abbr = ['en', 'ar', 'fr', 'es'];
        $name = str_replace('.', '', $this->faker->text($maxNbChars = 50));
        return [
            'translation_lang' => $abbr[array_rand($abbr)],
            'translation_of' => rand(0, 50),
            'name' => $name,
            'slug' => str_replace(' ', '-', strtolower($name)),
            'photo' => 'images/main_category/FXFYIsjgsirlC9AvKjYYXNdQFPrtKIwPWhCL6PZv.png',
            'active' => rand(0, 1)
        ];
    }
}
