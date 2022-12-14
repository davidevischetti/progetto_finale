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

        
        $category = $request->get('category'); // prende i dati dalla request 
        $arrCategories = explode(',',$category); //divide il contenuto della request

        // dump($arrCategories);

        // dichiarazione array
        $arrRestIds = [];     
        $arrFilteredIds = [];


        // Cicliamo la request pushando gli id dei ristoranti in un array, controllando che i valori passati nella request corrispondano alle categorie del ristorante
        foreach($arrCategories as $category){
            $arrRest = User::whereHas('category', function($q) use($category){
                $q->where('categories.id', $category);
            })->get();

            // push id del ristorante nell'array
            foreach ($arrRest as $res) {
                $arrRestIds[] = $res->id;
            }
        }

        $restIdsCount = array_count_values($arrRestIds); // conta quante volte si ripete ogni valore nell'array

        // pushiamo in un array gli id dei ristoranti che risultano matchati con tutte le categorie richieste
        foreach ($restIdsCount as $id => $coutId) {
            if($coutId == count($arrCategories)) {
                $arrFilteredIds[] = $id;
            }
        }

        $restFiltered = User::with(['category'])->find($arrFilteredIds)->all();

        return response()->json([
            'success' => true,
            'arrRestaurants' => $restFiltered,
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
        $randomRest = User::with(['category'])->inRandomOrder()->limit(8)->get();

        return response()->json([
           'success' => true,
            'randomRest' => $randomRest
        ]);
    }



}
