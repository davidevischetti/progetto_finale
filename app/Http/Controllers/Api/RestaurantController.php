<?php

namespace App\Http\Controllers\Api;

use App\Models\User;
use App\Models\Plate;
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

    public function fixImageUrl($imgPath) {
        return $imgPath ? asset('/storage/' . $imgPath) : null;
    }

    // api che restituisce le i ristoranti da visualizzare (con anche i piatti) nel json
    public function restaurants(Request $request){
        $restaurants= User::all();
        foreach( $restaurants as $restaurant){
            $restaurant->img = $this->fixImageUrl($restaurant->img);
        }


        $category = $request->get('category');
        $arrCategories = explode('-',$category);



        $arrProva = [];
        $arrIdsRest = [];

        $arrRest = User::whereHas('category', function($q){
            $q->where('categories.id', 5);
        })->get();

        foreach ($arrRest as $res) {
            $arrProva[] = $res->id;
        }

        
        $arrRest = User::whereHas('category', function($q){
            $q->where('categories.id', 2);
        })->get();

        foreach ($arrRest as $res) {
            $arrProva[] = $res->id;
        }
        // dump($arrProva);

        $userIdsCount = array_count_values($arrProva);
        // dump($userIdsCount);

        foreach ($userIdsCount as $item => $coutId) {
            if($coutId == 2) {
                $arrIdsRest[] = $item;
            }
        }

        // dump($arrIdsRest);
        
        $userFilter = User::find($arrIdsRest)->all();

        return response()->json([
            'success' => true,
            // 'arrRestaurants' => $arrRest,
            'userFilter' => $userFilter
        ]);
    }


    public function show($id){


        $infoRestaurant = User::where('id', $id)->first();
        $plate = Plate::where('user_id', $id)->get();


        return response()->json([
            'success' => true,
            'infoRestaurant' => $infoRestaurant,
            'plates' => $plate
        ]);

    }
    public function random() {
        $randomRest = User::inRandomOrder()->limit(8)->get();

        return response()->json([
           'success' => true,
            'randomRest' => $randomRest
        ]);
    }






    

}
