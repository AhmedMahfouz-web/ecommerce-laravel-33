<?php

namespace Database\Factories;

use App\Models\Vendor;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;

class VendorFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Vendor::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $name = $this->faker->company;
        return [
            'name' => $name,
            'mobile' => $this->faker->phoneNumber,
            'address' => $this->faker->streetAddress,
            'email' => $this->faker->safeEmail,
            'logo' => 'images/vendors/S4312HTPH60aOhp9D9m56B84YAjofvcjOcS6T2Ci.jpg',
            'slug' => str_replace(' ', '-', strtolower($name)),
            'password' => Hash::make('123456'),
            'verified' => '1'
        ];
    }
}
