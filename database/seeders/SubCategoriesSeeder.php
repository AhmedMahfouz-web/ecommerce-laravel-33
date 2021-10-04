<?php

namespace Database\Seeders;

use App\Models\SubCategories;
use Illuminate\Database\Seeder;

class SubCategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        SubCategories::factory()->count(100)->create();
    }
}
