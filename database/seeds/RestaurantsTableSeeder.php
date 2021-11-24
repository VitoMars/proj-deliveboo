<?php

use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use App\Restaurant;

class RestaurantsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        for ($i = 0; $i < 10; $i++) {
            $new_restaurant = new Restaurant();
            $new_restaurant->name = $faker->name();
            $new_restaurant->address = $faker->address(50);
            $new_restaurant->description = $faker->paragraph();
            // RandomFloat 
            // 1* numero = cifre dopo la virgola
            // 2* e 3* numero = il range di valori 
            $new_restaurant->delivery_cost = $faker->randomFloat(2, 1, 9);
            $new_restaurant->speciality = $faker->word();
            $new_restaurant->slug = $faker->slug();
            $new_restaurant->save();
        }
    }
}
