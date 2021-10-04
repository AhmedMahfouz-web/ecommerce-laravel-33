<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LanguagesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $name = ['English', 'Arabic', 'France', 'Spain'];
        $abbr = ['en', 'ar', 'fr', 'es'];
        $direction = 'ltr';
        for ($i = 0; $i < count($name); $i++) {
            if ($name[$i] == 'Arabic') {
                $direction = 'rtl';
            }
            DB::table('languages')->insert([
                'name' => $name[$i],
                'abbr' => $abbr[$i],
                'direction' => $direction,
                'active' => rand(0, 1)
            ]);
        }
    }
}
