<?php

namespace App\Http\Controllers\Api;

use App\Models\User;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class RestaurantController extends Controller
{
    public function index(Request $request){

        $category = $request->get('category');

        $arrRestaurants = User::join('category_user', 'users.id', '=', 'category_user.user_id')
                            ->join('categories', 'category_user.category_id', '=', 'categories.id')
                            ->select('users.*','categories.name as categoryName', 'categories.id as categoryId')
        ->where('category_id', $category)->get();



        $categories = Category::all();

        return response()->json([
            'success' => true,
            'categories' => $categories,
            'arrRestaurants' => $arrRestaurants
        ]);
    }



}
