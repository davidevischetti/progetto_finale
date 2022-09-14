<?php

namespace App\Http\Controllers\Restaurant;

use App\Models\Plate;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class PlateController extends Controller
{
    protected $validations = [
        'name' => 'required|string|max:255',
        'ingredients' => 'required|string|max:255',
        'description' => 'required|string|max:500',
        'price' => 'required|numeric',
        'img' =>'nullable|file|image|max:1024',
        'visible' =>'boolean',
    ];

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $plates = Auth::user()->plates()->orderBy('name')->paginate(8);

        return view('restaurant.plates.index', compact('plates'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view ('restaurant.plates.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate($this->validations);

        $create_data = $request->all();

        // STORAGE IMMAGINI
        if (key_exists('img', $create_data)) {
            $img_path = Storage::put('uploads', $create_data['img']);
            $create_data['img'] = $img_path;
        }

        $create_data = $create_data + [
            'user_id' => Auth::id()
        ];

        $plate = Plate::create($create_data);

        return redirect()->route('restaurant.plates.index', compact('plate'))
            ->with([
                'creato' => 'piatto creato con successo',
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Plate  $plate
     * @return \Illuminate\Http\Response
     */
    public function show(Plate $plate)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Plate  $plate
     * @return \Illuminate\Http\Response
     */
    public function edit(Plate $plate)
    {
        return view ('restaurant.plates.edit', compact('plate'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Plate  $plate
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Plate $plate)
    {
        $request->validate($this->validations);

        $edit_data = $request->all();

        // STORAGE IMMAGINI
        // TODO: ADD NEW IMG AND DELETE OLD IMG
        if(key_exists('img', $edit_data)) {
            if($plate->img) {
                Storage::delete($plate->img);

                $img_path = Storage::put('uploads', $edit_data['img']);
                $edit_data['img'] = $img_path;
            }
        }

        $plate->update($edit_data);

        return redirect()->route('restaurant.plates.index')->with([
            'modificato' => 'piatto modificato con successo',
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Plate  $plate
     * @return \Illuminate\Http\Response
     */
    public function destroy(Plate $plate)
    {
        $plate->delete();

        return redirect()->route('restaurant.plates.index')->with([
            'eliminato' => 'piatto eliminato con successo',
        ]);;
    }
}
