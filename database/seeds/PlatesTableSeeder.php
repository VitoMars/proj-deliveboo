<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Faker\Generator as Faker;
use App\Plate;
use \FakerRestaurant\Provider\it_IT\Restaurant as Restaurant;

$food = \Faker\Factory::create();
// $food->addProvider(new \FakerRestaurant\Provider\it_IT\Restaurant($food));

class PlatesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker, Restaurant $food)
    {
        for ($i = 0; $i < 10; $i++) {
            $new_plate = new Plate();
            $new_plate->name = $food->foodName();
            $new_plate->description = $faker->paragraph();
            $new_plate->price = $faker->randomFloat(2, 1, 9);
            $new_plate->menu_category = $faker->word();
            $new_plate->rating = $faker->randomFloat(1, 1, 5);
            // $new_plate->slug = Str::slug($new_plate->name, '-');
            $new_plate->restaurant_id = $faker->numberBetween(1, 10);

            //Metodo per creare lo slug in automatico
            $slug = Str::slug($new_plate->name, '-');
            $slug_base = $slug;

            $slug_presente = Plate::where('slug', $slug)->first();

            $contatore = 1;

            while ($slug_presente) {
                $slug = $slug_base . '-' . $contatore;
                $slug_presente = Plate::where('slug', $slug)->first();
                $contatore++;
            }

            $new_plate->slug = $slug;

            // Salvataggio
            $new_plate->save();
        }
    }
}
