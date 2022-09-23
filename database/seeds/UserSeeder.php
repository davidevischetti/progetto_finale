<?php

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = [
            [
                'email'     => 'dapippo@libero.it',
                'password'  => Hash::make('dapippo'),
                'name'      => 'Da Pippo',
                'address'   => 'Via Roma, N.1',
                'img'       => 'uploads/italian-spaghetti-with-tomato-sauce-in-pan.jpg',
                'p_iva'     => 11111111111,
            ],
            [
                'email'     => 'pizzagiapponese@libero.it',
                'password'  => Hash::make('pizzagiapponese'),
                'name'      => 'Pizzeria da Mimmo',
                'address'   => 'Via Milano, N.2',
                'img'       => 'uploads/pizza-with-salami-tomatoes-olives-cheese-dough-with-whole-wheat-flour-italian-food.jpg',
                'p_iva'     => 22222222222,
            ],
            [
                'email'     => 'vogliadiburrito@libero.it',
                'password'  => Hash::make('vogliadiburrito'),
                'name'      => 'Voglia di burrito',
                'address'   => 'Via Napoli, N.3',
                'img'       => 'uploads/top-view-delicious-tacos-with-meat.jpg',
                'p_iva'     => 33333333333,
            ],
            [
                'email'     => 'sushitanakakata@libero.it',
                'password'  => Hash::make('sushitanakakata'),
                'name'      => 'Mumi sushi',
                'address'   => 'Via Firenze, N.4',
                'img'       => 'uploads/group-rolls-maki-isolated-white-background.jpg',
                'p_iva'     => 44444444444,
            ],
            [
                'email'     => 'alibabbaro@libero.it',
                'password'  => Hash::make('alibabbaro'),
                'name'      => 'Pizza express kebab',
                'address'   => 'Via Torino, N.5',
                'img'       => 'uploads/side-view-chicken-doner-grilled-chicken-with-cucumber-tomato-greens-red-onion-sauce-bread.jpg',
                'p_iva'     => 55555555555,
            ],

        ];

        foreach ($users as $user) {
            User::create($user);
        }
    }
}
