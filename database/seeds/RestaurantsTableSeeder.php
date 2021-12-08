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
        $new_restaurant = new Restaurant();
        $new_restaurant->name = "Ristorante dell'Admin";
        $new_restaurant->address = $faker->address(50);
        $new_restaurant->description = $faker->paragraph();
        $new_restaurant->user_id = 1;
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
