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
            [
                'email'     => 'ristorantedanino@libero.it',
                'password'  => Hash::make('ristorantedanino'),
                'name'      => 'Ristorante da Nino',
                'address'   => 'Via Bologna, N.17',
                'img'       => 'uploads/ristorante-italiano-1.jpg',
                'p_iva'     => 43126543765,
            ],
            [
                'email'     => 'lacucinaitaliana@libero.it',
                'password'  => Hash::make('lacucinaitaliana'),
                'name'      => 'La cucina Italiana',
                'address'   => 'Via Italia, N.100',
                'img'       => 'uploads/ristorante-italiano-2.jpg',
                'p_iva'     => 76452345645,
            ],
            [
                'email'     => 'fish&@libero.it',
                'password'  => Hash::make('fish&'),
                'name'      => 'Fish&',
                'address'   => 'Via Ladispoli, N.74',
                'img'       => 'uploads/ristorante-italiano-3.jpg',
                'p_iva'     => 42316354865,
            ],
            [
                'email'     => 'laltrapizza@libero.it',
                'password'  => Hash::make('laltrapizza'),
                'name'      => 'L\'altra pizza',
                'address'   => 'Via Matera, N.7',
                'img'       => 'uploads/ristorante-pizza-1.jpg',
                'p_iva'     => 65438756742,
            ],
            [
                'email'     => 'lamigliorpizza@libero.it',
                'password'  => Hash::make('lamigliorpizza'),
                'name'      => 'La miglior pizza',
                'address'   => 'Via Toscana, N.16',
                'img'       => 'uploads/ristorante-pizza-2.jpg',
                'p_iva'     => 96786354747,
            ],
            [
                'email'     => 'pizzeriaitalia@libero.it',
                'password'  => Hash::make('pizzeriaitalia'),
                'name'      => 'Pizzeria Italia',
                'address'   => 'Via Centro, N.99',
                'img'       => 'uploads/ristorante-pizza-3.jpg',
                'p_iva'     => 52344567645,
            ],
            [
                'email'     => 'tokyosushi@libero.it',
                'password'  => Hash::make('tokyosushi'),
                'name'      => 'Tokyo sushi',
                'address'   => 'Via tokyo, N.130',
                'img'       => 'uploads/ristorante-sushi-1.jpg',
                'p_iva'     => 52343645174,
            ],
            [
                'email'     => 'konnichiwa@libero.it',
                'password'  => Hash::make('konnichiwa'),
                'name'      => 'Konnichiwa',
                'address'   => 'Via del prete, N.55',
                'img'       => 'uploads/ristorante-sushi-2.jpg',
                'p_iva'     => 52437146764,
            ],
            [
                'email'     => 'justsushi@libero.it',
                'password'  => Hash::make('pizzeriaitalia'),
                'name'      => 'Just Sushi',
                'address'   => 'Via della marmotta, N.43',
                'img'       => 'uploads/ristorante-sushi-3.jpg',
                'p_iva'     => 65437564534,
            ],
            [
                'email'     => 'piccapicca@libero.it',
                'password'  => Hash::make('piccapicca'),
                'name'      => 'Picca Picca',
                'address'   => 'Via del fuoco, N.37',
                'img'       => 'uploads/ristorante-messicano-1.jpg',
                'p_iva'     => 65438672375,
            ],
            [
                'email'     => 'labombamessicana@libero.it',
                'password'  => Hash::make('labombamessicana'),
                'name'      => 'La bomba messicana',
                'address'   => 'Via sombrero, N.26',
                'img'       => 'uploads/ristorante-messicano-2.jpg',
                'p_iva'     => 43213645975,
            ],
            [
                'email'     => 'ilredeitacos@libero.it',
                'password'  => Hash::make('ilredeitacos'),
                'name'      => 'Il re dei tacos',
                'address'   => 'Via america, N.146',
                'img'       => 'uploads/ristorante-messicano-3.jpg',
                'p_iva'     => 63541742765,
            ],
            [
                'email'     => 'sublime@libero.it',
                'password'  => Hash::make('sublime'),
                'name'      => 'Sublime',
                'address'   => 'Via gallipoli, N.4',
                'img'       => 'uploads/ristorante-dolci-1.jpg',
                'p_iva'     => 63457645234,
            ],
            [
                'email'     => 'idolcidellacasa@libero.it',
                'password'  => Hash::make('idolcidellacasa'),
                'name'      => 'I dolci della casa',
                'address'   => 'Via montanara, N.12',
                'img'       => 'uploads/ristorante-dolci-2.jpg',
                'p_iva'     => 63458576258,
            ],
            [
                'email'     => 'lacasadelcioccolato@libero.it',
                'password'  => Hash::make('lacasadelcioccolato'),
                'name'      => 'La casa del cioccolato',
                'address'   => 'Via dello zucchero, N.87',
                'img'       => 'uploads/ristorante-dolci-3.jpg',
                'p_iva'     => 72159625876,
            ],
            [
                'email'     => 'magicbowl@libero.it',
                'password'  => Hash::make('magicbowl'),
                'name'      => 'Magic bowl',
                'address'   => 'Via salaria, N.35',
                'img'       => 'uploads/ristorante-poke-1.jpg',
                'p_iva'     => 84720783234,
            ],
            [
                'email'     => 'mistosapori@libero.it',
                'password'  => Hash::make('mistosapori'),
                'name'      => 'Misto sapori',
                'address'   => 'Via giovanni, N.62',
                'img'       => 'uploads/ristorante-poke-2.jpg',
                'p_iva'     => 12344567642,
            ],
            [
                'email'     => 'lafreschezza@libero.it',
                'password'  => Hash::make('lafreschezza'),
                'name'      => 'La freschezza',
                'address'   => 'Via inverno, N.174',
                'img'       => 'uploads/ristorante-poke-3.jpg',
                'p_iva'     => 76453543453,
            ],
            [
                'email'     => 'burgerlandia@libero.it',
                'password'  => Hash::make('burgerlandia'),
                'name'      => 'BurgerLandia',
                'address'   => 'Via del corso, N.83',
                'img'       => 'uploads/ristorante-americano-1.jpg',
                'p_iva'     => 84521457856,
            ],
            [
                'email'     => 'justburger@libero.it',
                'password'  => Hash::make('justburger'),
                'name'      => 'Just Burger',
                'address'   => 'Via dei gatti, N.9',
                'img'       => 'uploads/ristorante-americano-2.jpg',
                'p_iva'     => 74563123434,
            ],
            [
                'email'     => 'streetfood@libero.it',
                'password'  => Hash::make('streetfood'),
                'name'      => 'Street Food',
                'address'   => 'Via gorilla, N.682',
                'img'       => 'uploads/ristorante-americano-3.jpg',
                'p_iva'     => 86496478452,
            ],
            [
                'email'     => 'thenewkebab@libero.it',
                'password'  => Hash::make('thenewkebab'),
                'name'      => 'The new kebab',
                'address'   => 'Via napoli, N.425',
                'img'       => 'uploads/ristorante-kebab-1.jpg',
                'p_iva'     => 82374582232,
            ],
            [
                'email'     => 'halal@libero.it',
                'password'  => Hash::make('halal'),
                'name'      => 'Halal',
                'address'   => 'Via india, N.682',
                'img'       => 'uploads/ristorante-kebab-2.jpg',
                'p_iva'     => 89064532734,
            ],
            [
                'email'     => 'cirokebab@libero.it',
                'password'  => Hash::make('cirokebab'),
                'name'      => 'Ciro kebab',
                'address'   => 'Via della seta, N.1092',
                'img'       => 'uploads/ristorante-kebab-3.jpg',
                'p_iva'     => 56246534634,
            ],

        ];

        foreach ($users as $user) {
            User::create($user);
        }
    }
}
