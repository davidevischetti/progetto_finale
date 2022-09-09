<?php

use App\Models\User;
use Illuminate\Database\Seeder;

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
                'p_iva'     => 11111111111,
            ],
            [
                'email'     => 'pizzagiapponese@libero.it',
                'password'  => Hash::make('pizzagiapponese'),
                'name'      => 'Pizza giapponese',
                'address'   => 'Via Milano, N.2',
                'p_iva'     => 22222222222,
            ],
            [
                'email'     => 'vogliadiburrito@libero.it',
                'password'  => Hash::make('vogliadiburrito'),
                'name'      => 'Voglia di burrito',
                'address'   => 'Via Napoli, N.3',
                'p_iva'     => 33333333333,
            ],
            [
                'email'     => 'sushitanakakata@libero.it',
                'password'  => Hash::make('sushitanakakata'),
                'name'      => 'Sushita Nakakata',
                'address'   => 'Via Firenze, N.4',
                'p_iva'     => 44444444444,
            ],
            [
                'email'     => 'alibabbaro@libero.it',
                'password'  => Hash::make('alibabbaro'),
                'name'      => 'Alibabbaro',
                'address'   => 'Via Torino, N.5',
                'p_iva'     => 55555555555,
            ],

        ];

        foreach ($users as $user) {
            User::create($user);
        }
    }
}
