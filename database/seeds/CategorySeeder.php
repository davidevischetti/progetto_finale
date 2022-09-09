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
                'img'  => 'https://primochef.it/wp-content/uploads/2018/06/SH_pasta_al_pomodoro-1.jpg',
            ],
            [
                'name'     => 'pizza',
                'img'  => 'https://media-assets.vanityfair.it/photos/61e444841e21bc3bd54b5357/1:1/w_2832,h_2832,c_limit/pizza%20tendenze.jpg',
            ],
            [
                'name'     => 'giapponese',
                'img'  => 'https://static.gamberorosso.it/2022/01/sushi-768x512.jpeg',
            ],
            [
                'name'     => 'messicano',
                'img'  => 'https://cdn.ilclubdellericette.it/wp-content/uploads/2021/07/burrito-di-carne-1280x720.jpg',
            ],
            [
                'name'     => 'kebab',
                'img'  => 'https://static.cookist.it/wp-content/uploads/sites/21/2019/05/kebab-fatto-in-casa.jpg',
            ],

        ];

        foreach ($categories as $category) {
            Category::create($category);
        }
    }
}
