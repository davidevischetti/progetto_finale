<?php

use App\Models\Plate;
use Illuminate\Database\Seeder;

class PlateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $plates = [
            [
                'name'          => 'Pasta patate e provola',
                'ingredients'   => 'pasta, patate, provola',
                'description'   => 'si tratta di una pasta con patate e provola',
                'price'         => 5,
                'img'           => 'https://chefinciabatte.files.wordpress.com/2021/12/patate-e-provola.jpg?w=480',
                'visible'       => true,
                'user_id'       => 1,
            ],
            [
                'name'          => 'Pizza nipponica',
                'ingredients'   => 'farina, acqua, lievito, sale, tonno, katsuobushi, pomodorino piennolo',
                'description'   => 'si tratta di una pizza in stile nipponico/italiano',
                'price'         => 15,
                'img'           => 'https://media-cdn.tripadvisor.com/media/photo-m/1280/1c/47/da/10/katsuobushi.jpg',
                'visible'       => true,
                'user_id'       => 1,
            ],
            [
                'name'          => 'Burrito gonzales',
                'ingredients'   => 'farina di mais, acqua, riso venere, chili con carne, fagioli neri, jalapeno, cipolla',
                'description'   => 'si tratta di un burrito con carne piccante',
                'price'         => 10,
                'img'           => 'https://wips.plug.it/cips/buonissimo.org/cms/2013/04/burritos-de-carne-de-cerdo.jpg?w=713&a=c&h=407',
                'visible'       => true,
                'user_id'       => 1,
            ],
            [
                'name'          => 'Uramaki California',
                'ingredients'   => 'riso giapponese, alga nori, polpa di granchio, avocado, salmone, tonno, semi di sesamo',
                'description'   => 'si tratta di un uramaki di granciporro e avocado con topping di salmone e tonno crudi',
                'price'         => 22,
                'img'           => 'https://m.my-personaltrainer.it/images/ricette/573/uramaki-sushi-california-roll.jpg',
                'visible'       => true,
                'user_id'       => 1,
            ],
            [
                'name'          => 'Panino kebab',
                'ingredients'   => 'Farina, acqua, lievito, sale, kebab, cipolla, pomodori, insalata, verza rossa e anche quella bianca, salsa yogurt, NO PICCANTO',
                'description'   => 'si tratta di un kebab con tutta roba buona',
                'price'         => 4,
                'img'           => 'https://www.leerdammer.it/wp-content/uploads/2019/01/Donner_Kebab_Cologne_Germany_1057919169.jpg',
                'visible'       => true,
                'user_id'       => 1,
            ],
            [
                'name'          => 'eeeeeeeeeeeeeeeeeeeeeeeeeee',
                'ingredients'   => 'eeeeeeeeeeeeeeeeeeeeeeeeeee',
                'description'   => 'eeeeeeeeeeeeeeeeeeeeeeeeeee',
                'price'         => 4,
                'img'           => 'eeeeeeeeeeeeeeeeeeeeeeeeeee',
                'visible'       => false,
                'user_id'       => 1,
            ],
            [
                'name'          => 'aaaaaaaaaaaaaaaaaaaaaaaaaa',
                'ingredients'   => 'aaaaaaaaaaaaaaaaaaaaaaaaaa',
                'description'   => 'aaaaaaaaaaaaaaaaaaaaaaaaaa',
                'price'         => 1,
                'img'           => 'aaaaaaaaaaaaaaaaaaaaaaaaa',
                'visible'       => false,
                'user_id'       => 1,
            ],
            [
                'name'          => 'bbbbbbbbbbbbbbbbbbbbbb',
                'ingredients'   => 'bbbbbbbbbbbbbbbbbbbbbb',
                'description'   => 'bbbbbbbbbbbbbbbbbbbbbb',
                'price'         => 1,
                'img'           => 'bbbbbbbbbbbbbbbbbbbbbb',
                'visible'       => false,
                'user_id'       => 1,
            ],
            [
                'name'          => 'cccccccccccccccccccccccccc',
                'ingredients'   => 'cccccccccccccccccccccccccc',
                'description'   => 'cccccccccccccccccccccccccc',
                'price'         => 4,
                'img'           => 'cccccccccccccccccccccccccc',
                'visible'       => false,
                'user_id'       => 1,
            ],
            [
                'name'          => 'dddddddddddddddddddd',
                'ingredients'   => 'dddddddddddddddddddd',
                'description'   => 'dddddddddddddddddddd',
                'price'         => 4,
                'img'           => 'dddddddddddddddddddd',
                'visible'       => false,
                'user_id'       => 1,
            ],

        ];

        foreach ($plates as $plate) {
            Plate::create($plate);
        }
    }
}
