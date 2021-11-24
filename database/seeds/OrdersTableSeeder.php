<?php

use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use App\Order;

class OrdersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        for ($i = 0; $i < 10; $i++) {
            $new_orders = new Order();
            $new_orders->order_date = $faker->dateTime();
            $new_orders->address = $faker->address();
            $new_orders->note = $faker->text(50);
            $new_orders->delivery_cost = $faker->randomFloat(2, 1, 9);
            $new_orders->save();
        }
    }
}
