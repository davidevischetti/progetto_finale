<?php

namespace App\Http\Controllers\Restaurant;

use App\Models\User;
use App\Models\Plate;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class RestaurantController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function dashboard()
    {
        $userName = Auth::user();
        $platesVisible = Auth::user()->plates()->where('visible', '=', true)->orderBy('name')->paginate(8);

        return view('restaurant.dashboard', [
            'platesVisible' => $platesVisible,
            'userName' => $userName,
        ]);
    }
}
