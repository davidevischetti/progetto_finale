<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Auth\Events\Registered;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

class RegisterController extends Controller
{

    use RegistersUsers;

    protected $redirectTo = RouteServiceProvider::HOME;

    public function __construct()
    {
        $this->middleware('guest');
    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name'      => ['required', 'string', 'max:255'],
            'email'     => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password'  => ['required', 'string', 'min:8', 'confirmed'],
            'address'   => ['required', 'string', 'max:255', 'unique:users'],
            'p_iva'   => ['required', 'string','unique:users','min:11', 'max:11'],
            'img'   => 'nullable|file|image|max:1024',
            'categories.*' =>'integer|exists:categories,id',
        ]);
    }

    protected function create(array $data)
    {

        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'address' => $data['address'],
            'p_iva' => $data['p_iva'],
            'categories' => $data['categories'],
            'img' => $data['img'],
        ]);
    }

    public function showRegistrationForm()
    {
        $categories = Category::all();
        return view('auth.register', compact('categories'));
    }

    public function register(Request $request)
    {
        $this->validator($request->all())->validate();

        $dataform = $request->all();

        // STORAGE IMMAGINI
        if (key_exists('img', $dataform)) {
            $img_path = Storage::put('uploads', $dataform['img']);
            $dataform['img'] = $img_path;
        } else {
            $idCategory = $dataform['categories'][0];
            $dataCategory = Category::find($idCategory);
            $dataform['img'] = $dataCategory['img'];
        }

        event(new Registered($user = $this->create($dataform)));

        $user->category()->sync($dataform['categories']);

        $this->guard()->login($user);

        return redirect()->route('restaurant.dashboard')->with([
            'registrato' => 'la tua registrazione è avvenuta con successo, benvenuto nella tua dashboard!',
        ]);
    }
}
