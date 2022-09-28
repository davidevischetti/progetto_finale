<?php

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = [
            [
                'name'     => 'italiano',
                'img'  => 'uploads/italiano.jpg',
                //1
            ],
            [
                'name'     => 'pizza',
                'img'  => 'uploads/pizza.jpg',
                //2
            ],
            [
                'name'     => 'giapponese',
                'img'  => 'uploads/giapponese.jpg',
                //3
            ],
            [
                'name'     => 'messicano',
                'img'  => 'uploads/messicano.jpg',
                //4
            ],
            [
                'name'     => 'dolci',
                'img'  => 'uploads/dolci.jpg',
                //5
            ],
            [
                'name'     => 'pokè',
                'img'  => 'uploads/poké.jpg',
                //6
            ],
            [
                'name'     => 'americano',
                'img'  => 'uploads/americano.jpg',
                //7
            ],
            [
                'name'     => 'kebab',
                'img'  => 'uploads/kebab.jpg',
                //8
            ],

        ];

        foreach ($categories as $category) {
            Category::create($category);
        }
    }
}
