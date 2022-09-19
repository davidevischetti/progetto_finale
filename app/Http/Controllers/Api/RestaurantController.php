<?php

namespace App\Http\Controllers\Api;

use App\Models\User;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class RestaurantController extends Controller
{

    // api che restituisce le categorie da visualizzare
    public function categories() {
        $categories = Category::all();

        return response()->json([
            'success' => true,
            'categories' => $categories,
        ]);
    }

    // api che restituisce le i ristoranti da visualizzare (con anche i piatti) nel json
    public function restaurants(Request $request){

        $category = $request->get('category');
        $arrCategories = explode('-', $category);

        $arrCiao = User::with(['category'])->get();


        $prova = $arrCiao[2]->category;

        $arrCat = [];
        foreach ($prova as $cat) {
            array_push($arrCat, $cat->id);
        }
        foreach ($arrCat as $id) {

            $arrRestaurants = User::join('category_user', 'users.id', '=', 'category_user.user_id')
                            ->join('categories', 'category_user.category_id', '=', 'categories.id')
                            ->select('users.*','categories.name as categoryName', 'categories.id as categoryId', 'category_user.*')
                            ->where('category_id', $id)->get();

        }

        sort($arrCategories);
        sort($arrCat);

        // dump($arrCategories);
        // dump($arrCat);


        $user = [];
        if($arrCat === $arrCategories) {
            foreach ($arrCat as $cat2){
                $user = User::join('category_user', 'users.id', '=', 'category_user.user_id')
                ->join('categories', 'category_user.category_id', '=', 'categories.id')
                ->select('users.*','categories.name as categoryName', 'categories.id as categoryId', 'category_user.*')
                ->where('category_id', $cat2)->get();
            }
        }

        return response()->json([
            'success' => true,
            'arrCiao' => $prova,
            'arrCat' => $arrCat,
            'arrRestaurants' => $arrRestaurants,
            'user' => $user
        ]);
    }


    public function show($id){


        $infoRestaurant = User::find($id)->where('id', $id)->get();

        return response()->json([
            'success' => true,
            'infoRestaurant' => $infoRestaurant,
        ]);

    }



}






// $arrRestaurants = User::with(['category'])
//             ->whereHas('category', function($q) use($arrCategories) {
//                 for ($i=0; $i < count($arrCategories) ; $i++) {
//                     $category = $arrCategories[$i];
//                     $q->where('category_id', $category);
//                 }
//                 // foreach ($arrCategories as $category ) {
//                 // }
//             })->get();
