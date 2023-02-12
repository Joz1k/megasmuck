<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use App\Models\User;
use App\Models\Image;
use App\Models\Product;
use App\Models\ImageProduct;
use App\Models\user_data;
use Illuminate\Validation\Rules\Password;

class AuthController extends Controller
{
    public function index(Request $request)
    {
        if((user_data::where('ip_address', '=', $request->ip())->first()) === null){
        $ip = user_data::create([
            'ip_address' => $request->ip(),
            'headers' => $request->header('User-agent'),
        ]);
    }
        $products = Product::with('products')->orderBy('sold', 'DESC')->join('images', 'products.id', '=', 'images.id')->paginate(12);
        $artilces = '';
        if ($request->ajax()) {
            foreach ($products as $result) {
                $artilces.='
                    <div class="row row-cols-1 g-4">
                      <div class="col">
                        <div class="card mt-5" style="width:300px; height:26rem;">
                            <div class="wrapper exmpl"><img class="card-img-top img-fluid" src="'.$result->path.'" alt="'.$result->name.'"></div>
                                <div class="card-body">
                                    <h4 class="card-title mb-2">'."$result->id $result->name".'</h4>
                                        <div class="d-flex justify-content-between align-items-center pb-2 mt-5">
                                        <h5 class="card-text">'.$result->price.'&#8381;</h5>
                                        <a href="http://127.0.0.1:8000/products/'."$result->id".'" class="btn btn-primary" style="background-color: #50B946 !important;
                                        border-color: #50B946 !important;">В корзину</a>
                                        </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

        ';
            }
            return $artilces;
        }
        return view('products', compact('products'));
    }

    public function search(Request $request)
    {
        $products = Product::where('name', 'LIKE', '%'. $request->search .'%')
            ->with('products')->orderBy('sold', 'DESC')
            ->join('images', 'products.id', '=', 'images.id')
            ->paginate(12);
        return view('searchPage', compact('products'));
    }

    public function postLogin(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'password' => 'required',
        ]);

        $credentials = $request->only('name', 'password');
        if (Auth::attempt($credentials)) {
            return redirect()->intended('dashboard')->withSuccess('Успешный вход');
        }

        return redirect("products")->withSuccess('Неверный логин или пароль');
    }

    public function postRegistration(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:users|min:4|max:15|string|regex:/^[a-zA-Z0-9]+$/',
            'email' => 'required|email|unique:users',
            'password' => [
                'required',
                Password::min(8)
                  ->numbers(),
                'max:20',
                'regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d).+$/',
            ],
        ]);

        $data = $request->all();
        $check = $this->create($data);

        return redirect("dashboard")->withSuccess('Успешная регистрация');
    }

    public function dashboard()
    {
        if(Auth::check()){
            return view('dashboard');
        }

        return redirect("products")->withSuccess('Нет доступа');
    }

    public function create(array $data)
    {
      return User::create([
        'name' => $data['name'],
        'email' => $data['email'],
        'password' => Hash::make($data['password'])
      ]);
    }


    public function logout() {
        Session::flush();
        Auth::logout();

        return Redirect('products');
    }
}
