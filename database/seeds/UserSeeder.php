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
                'img'       => 'uploads/italiano.jpg',
                'p_iva'     => 11111111111,
            ],
            [
                'email'     => 'dolcichepassione@libero.it',
                'password'  => Hash::make('dolcichepassione'),
                'name'      => 'Dolci che passione',
                'address'   => 'Via Milano, N.2',
                'img'       => 'uploads/dolci.jpg',
                'p_iva'     => 22222222222,
            ],
            [
                'email'     => 'vogliadiburrito@libero.it',
                'password'  => Hash::make('vogliadiburrito'),
                'name'      => 'Voglia di burrito',
                'address'   => 'Via Napoli, N.3',
                'img'       => 'uploads/messicano.jpg',
                'p_iva'     => 33333333333,
            ],
            [
                'email'     => 'uachesuhi@libero.it',
                'password'  => Hash::make('uachesushi'),
                'name'      => 'ua\' che sushi',
                'address'   => 'Via Firenze, N.4',
                'img'       => 'uploads/giapponese.jpg',
                'p_iva'     => 44444444444,
            ],
            [
                'email'     => 'alibabbaro@libero.it',
                'password'  => Hash::make('alibabbaro'),
                'name'      => 'Pizza express kebab',
                'address'   => 'Via Torino, N.5',
                'img'       => 'uploads/kebab.jpg',
                'p_iva'     => 55555555555,
            ],

        ];

        foreach ($users as $user) {
            User::create($user);
        }
    }
}
