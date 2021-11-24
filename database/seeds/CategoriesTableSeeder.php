<?php

use Illuminate\Database\Seeder;
use App\Category;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = ["Italiano", "Internazionale", "Cinese", "Giapponese", "Messicano", "Indiano", "Pesce", "Carne", "Pizza"];

        for ($i = 0; $i < count($categories); $i++) {
            $new_categories = new Category();
            $new_categories->name = $categories[$i];
            $new_categories->save();
        }
    }
}
