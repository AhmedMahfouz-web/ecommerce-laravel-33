<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UsersSeeder::class);
        $this->call(AdminsSeeder::class);
        $this->call(LanguagesSeeder::class);
        $this->call(MainCategoriesSeeder::class);
        $this->call(SubCategoriesSeeder::class);
        $this->call(VendorsSeeder::class);
        $this->call(ProductsSeeder::class);
    }
}
