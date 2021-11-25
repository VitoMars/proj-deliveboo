<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
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
            $new_category = new Category();
            $new_category->name = $categories[$i];
            $new_category->slug = Str::slug($categories[$i], '-');
            $new_category->save();
        }
    }
}
