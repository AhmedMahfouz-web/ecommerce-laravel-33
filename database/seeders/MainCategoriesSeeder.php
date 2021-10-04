<?php

namespace Database\Seeders;

use App\Models\MainCategories;
use Illuminate\Database\Seeder;

class MainCategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        MainCategories::factory()->count(50)->create();
    }
}
