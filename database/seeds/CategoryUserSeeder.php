<?php

use App\Models\User;
use App\Models\Category;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;

class CategoryUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        $users = User::all();
        $categories = Category::all()->pluck('id');

        foreach ($users as $user) {
            $userCategories = $faker->randomElements($categories, rand(1, 3));

            foreach ($userCategories as $userCategory) {
                $user->category()->attach($userCategory);
            }
        }
    }
}
