<?php

use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use App\Plate;

class PlatesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        for ($i = 0; $i < 10; $i++) {
            $new_plates = new Plate();
            $new_plates->name = $faker->name();
            $new_plates->description = $faker->paragraph();
            $new_plates->price = $faker->randomFloat(2, 1, 9);
            $new_plates->visibility = $faker->boolean();
            $new_plates->menu_category = $faker->word();
            $new_plates->rating = $faker->randomFloat(1, 1, 9);
            $new_plates->slug = $faker->slug();
            $new_plates->save();
        }
    }
}
