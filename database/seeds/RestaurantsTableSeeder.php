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
        

        $new_restaurant = new Restaurant();
        $new_restaurant->name = "Pizzeria Bella Italia";
        $new_restaurant->address = $faker->address(50);
        $new_restaurant->description = $faker->paragraph();
        $new_restaurant->user_id = 2;
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


        $new_restaurant = new Restaurant();
        $new_restaurant->name = "The American Food";
        $new_restaurant->address = $faker->address(50);
        $new_restaurant->description = $faker->paragraph();
        $new_restaurant->user_id = 3;
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


        $new_restaurant = new Restaurant();
        $new_restaurant->name = "Best Sandwich";
        $new_restaurant->address = $faker->address(50);
        $new_restaurant->description = $faker->paragraph();
        $new_restaurant->user_id = 4;
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


        $new_restaurant = new Restaurant();
        $new_restaurant->name = "Ali Kebab";
        $new_restaurant->address = $faker->address(50);
        $new_restaurant->description = $faker->paragraph();
        $new_restaurant->user_id = 5;
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


        $new_restaurant = new Restaurant();
        $new_restaurant->name = "BurgerStore";
        $new_restaurant->address = $faker->address(50);
        $new_restaurant->description = $faker->paragraph();
        $new_restaurant->user_id = 6;
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


        $new_restaurant = new Restaurant();
        $new_restaurant->name = "Gelateria Gelè";
        $new_restaurant->address = $faker->address(50);
        $new_restaurant->description = $faker->paragraph();
        $new_restaurant->user_id = 7;
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


        $new_restaurant = new Restaurant();
        $new_restaurant->name = "Pasticceria Di Matteo";
        $new_restaurant->address = $faker->address(50);
        $new_restaurant->description = $faker->paragraph();
        $new_restaurant->user_id = 8;
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


        $new_restaurant = new Restaurant();
        $new_restaurant->name = "Ristorante Sakura";
        $new_restaurant->address = $faker->address(50);
        $new_restaurant->description = $faker->paragraph();
        $new_restaurant->user_id = 9;
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


        $new_restaurant = new Restaurant();
        $new_restaurant->name = "Pizzeria 50 Kalò";
        $new_restaurant->address = $faker->address(50);
        $new_restaurant->description = $faker->paragraph();
        $new_restaurant->user_id = 10;
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


        $new_restaurant = new Restaurant();
        $new_restaurant->name = "Ristorante sul Mare";
        $new_restaurant->address = $faker->address(50);
        $new_restaurant->description = $faker->paragraph();
        $new_restaurant->user_id = 11;
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


        $new_restaurant = new Restaurant();
        $new_restaurant->name = "Braceria Pino Pino";
        $new_restaurant->address = $faker->address(50);
        $new_restaurant->description = $faker->paragraph();
        $new_restaurant->user_id = 12;
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


        $new_restaurant = new Restaurant();
        $new_restaurant->name = "Food World Tour";
        $new_restaurant->address = $faker->address(50);
        $new_restaurant->description = $faker->paragraph();
        $new_restaurant->user_id = 13;
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


        $new_restaurant = new Restaurant();
        $new_restaurant->name = "Shanghai Restaurant";
        $new_restaurant->address = $faker->address(50);
        $new_restaurant->description = $faker->paragraph();
        $new_restaurant->user_id = 14;
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


        $new_restaurant = new Restaurant();
        $new_restaurant->name = "Tokio Sushi";
        $new_restaurant->address = $faker->address(50);
        $new_restaurant->description = $faker->paragraph();
        $new_restaurant->user_id = 15;
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


        $new_restaurant = new Restaurant();
        $new_restaurant->name = "El Sombrero";
        $new_restaurant->address = $faker->address(50);
        $new_restaurant->description = $faker->paragraph();
        $new_restaurant->user_id = 16;
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


        $new_restaurant = new Restaurant();
        $new_restaurant->name = "Ristorante Taj Mahal";
        $new_restaurant->address = $faker->address(50);
        $new_restaurant->description = $faker->paragraph();
        $new_restaurant->user_id = 17;
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


        $new_restaurant = new Restaurant();
        $new_restaurant->name = "Da Tonino";
        $new_restaurant->address = $faker->address(50);
        $new_restaurant->description = $faker->paragraph();
        $new_restaurant->user_id = 18;
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


        $new_restaurant = new Restaurant();
        $new_restaurant->name = "I Re del BBQ";
        $new_restaurant->address = $faker->address(50);
        $new_restaurant->description = $faker->paragraph();
        $new_restaurant->user_id = 19;
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


        $new_restaurant = new Restaurant();
        $new_restaurant->name = "Veggy Food";
        $new_restaurant->address = $faker->address(50);
        $new_restaurant->description = $faker->paragraph();
        $new_restaurant->user_id = 20;
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
