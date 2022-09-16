<?php

namespace App\Http\Controllers\Api;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Category;

class RestaurantController extends Controller
{



    public function index(){

        // $restaurants = User::with(['category'])->get();
        $categories = Category::all();

        return response()->json([
            'success' => true,
            'categories' => $categories
        ]);

    }














    // public function show(){

    //     $restaurants = User::with(['category', 'plates'])->get();



    //     return response()->json([
    //         'success' => true,
    //         'restaurants' => $restaurants
    //     ]);
    // }
}
