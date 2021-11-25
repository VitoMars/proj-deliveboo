<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
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
        $speciality = ["Pizza", "Hamburger", "Panini", "Sushi", "Dolci"];

        for ($i = 0; $i < 10; $i++) {
            $new_restaurant = new Restaurant();
            $new_restaurant->name = "Ristorante " . $faker->sentence(2);
            $new_restaurant->address = $faker->address(50);
            $new_restaurant->description = $faker->paragraph();
            // RandomFloat 
            // 1* numero = cifre dopo la virgola
            // 2* e 3* numero = il range di valori 
            $new_restaurant->delivery_cost = $faker->randomFloat(2, 1, 9);
            $new_restaurant->speciality =  $speciality[array_rand($speciality, 1)];
            // $new_restaurant->slug = Str::slug($new_restaurant->name, '-');

            //Metodo per creare lo slug in automatico
            $slug = Str::slug($new_restaurant->name, '-');
            $slug_base = $slug;

            $slug_presente = Restaurant::where('slug', $slug)->first();

            $contatore = 1;

            while ($slug_presente) {
                $slug = $slug_base . '-' . $contatore;
                $slug_presente = Restaurant::where('slug', $slug)->first();
                $contatore++;
            }

            $new_restaurant->slug = $slug;

            // Salvataggio
            $new_restaurant->save();
        }
    }
}
