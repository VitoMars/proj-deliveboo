<?php

use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {       
        for ($i = 0; $i < 10; $i++) {
            $new_user = new User();
            $new_user->name = $faker->name();
            $new_user->email = $faker->email();
            $new_user->password = $faker->password();
            $new_user->p_iva = $faker->numerify("###########");
            $new_user->address = $faker->address();
            $new_user->save();
        }

        $new_user = new User();
            $new_user->name = 'admin';
            $new_user->email = 'admin@mail.com';
            $new_user->password = '$2y$10$7UP4Vn6aoj.tFEKbaiXt4uUKg2i3b.bwyYzpwU7NH3/7EYvQEvVx6';
            $new_user->p_iva = $faker->numerify("###########");
            $new_user->address = $faker->address();
            $new_user->save();
    }
}
