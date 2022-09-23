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
                'img'  => '\uploads\italian-spaghetti-with-tomato-sauce-in-pan.jpg',
            ],
            [
                'name'     => 'pizza',
                'img'  => '\uploads\pizza-food.jpg',
            ],
            [
                'name'     => 'giapponese',
                'img'  => '\uploads\concept-of-tasty-food-with-sushi-rolls-top-view.jpg',
            ],
            [
                'name'     => 'messicano',
                'img'  => '\uploads\mexican-fresh-food.jpg',
            ],
            [
                'name'     => 'dolci',
                'img'  => '\uploads\assortment-pieces-cake.jpg',
            ],
            [
                'name'     => 'pokè',
                'img'  => '\uploads\takeaway-vegan-poke-bowl-photography.jpg',
            ],
            [
                'name'     => 'americano',
                'img'  => '\uploads\beef-burger-stuffed-with-mixed-ingreadients-black-board.jpg',
            ],
            [
                'name'     => 'kebab',
                'img'  => '\uploads\grilled-beed-wrap-doner-with-cucumber-prinkles-tomato-fries.jpg',
            ],

        ];

        foreach ($categories as $category) {
            Category::create($category);
        }
    }
}
