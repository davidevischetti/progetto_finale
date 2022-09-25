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

        // foreach ($users as $user) {
        //     $userCategories = $faker->randomElements($categories, rand(1, 3));

        //     foreach ($userCategories as $userCategory) {
        //         $user->category()->attach($userCategory);
        //     }
        // }

        // assegnamento categorie manuale
        User::find(1)->category()->attach([1,2,5]);
        User::find(2)->category()->attach([5,6]);
        User::find(3)->category()->attach([4,8]);
        User::find(4)->category()->attach([3,5,6]);
        User::find(5)->category()->attach([8,7,2]);
        User::find(6)->category()->attach([1,5,8]);
        User::find(7)->category()->attach([1,2,5,6]);
        User::find(8)->category()->attach([1,5]);
        User::find(8)->category()->attach([2,4,5,8]);
        User::find(9)->category()->attach([2,5]);
        User::find(10)->category()->attach([2,8,7]);
        User::find(11)->category()->attach([3,5,6]);
        User::find(12)->category()->attach([3]);
        User::find(13)->category()->attach([3,5]);
        User::find(14)->category()->attach([4]);
        User::find(15)->category()->attach([4,5,1]);
        User::find(16)->category()->attach([4,5]);
        User::find(17)->category()->attach([5]);
        User::find(18)->category()->attach([5,1]);
        User::find(19)->category()->attach([5,3]);
        User::find(20)->category()->attach([6,3,5]);
        User::find(21)->category()->attach([6]);
        User::find(22)->category()->attach([6,3]);
        User::find(23)->category()->attach([7,2,1]);
        User::find(24)->category()->attach([7,8,5]);
        User::find(25)->category()->attach([7,2]);
        User::find(26)->category()->attach([8,7,2,1]);
        User::find(27)->category()->attach([8,2,7]);
        User::find(28)->category()->attach([8,7]);
    }
}
