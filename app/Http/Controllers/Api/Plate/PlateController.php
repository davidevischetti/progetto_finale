<?php

namespace App\Http\Controllers\Api\Plate;

use App\Models\Plate;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\PlateResource;

class PlateController extends Controller
{
    public function index(Request $request) {
        $user_id = $request->get('userId');

        $plate = Plate::all()->where('user_id', $user_id)->all();
        return PlateResource::collection($plate);
    }

    // public function menu(Request $request) {
    //     $user_id = $request->get('userId');


    // }

}
