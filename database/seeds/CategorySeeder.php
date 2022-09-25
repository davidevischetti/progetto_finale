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
            ],
            [
                'name'     => 'pizza',
                'img'  => 'uploads/pizza.jpg',
            ],
            [
                'name'     => 'giapponese',
                'img'  => 'uploads/giapponese.jpg',
            ],
            [
                'name'     => 'messicano',
                'img'  => 'uploads/messicano.jpg',
            ],
            [
                'name'     => 'dolci',
                'img'  => 'uploads/dolci.jpg',
            ],
            [
                'name'     => 'pokè',
                'img'  => 'uploads/poké.jpg',
            ],
            [
                'name'     => 'americano',
                'img'  => 'uploads/americano.jpg',
            ],
            [
                'name'     => 'kebab',
                'img'  => 'uploads/kebab.jpg',
            ],

        ];

        foreach ($categories as $category) {
            Category::create($category);
        }
    }
}
