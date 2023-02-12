<?php

namespace App\Http\Controllers;

use App\Models\Image;
use App\Models\Product;
use App\Services\CookieService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Response;

class CookieController extends Controller
{
   /*  private $cookieService;

    public function __construct(CookieService $cookieService) {
        $this->cookieService = $cookieService;
    }

    public function index()
    {
        $data1 = Cookie::get('data');


        // foreach ($cookieData as $cookieEl)
        // {

        // }

        $bro=json_decode($data1);
        $i=0;
        $data = [];
        if ($bro == []) {
            foreach ($bro as $key => $value) {
                $id = Product::select('id')->where('name', '=', $value->name)->value('id');
                $path = Image::where('id', '=', $id)->value('path');
                $desc = Product::where('name', '=', $value->name)->value('description');
                $price = Product::where('name', '=', $value->name)->value('price');
                $discount = Product::where('name', '=', $value->name)->value('discount');
                $max = Product::where('name', '=', $value->name)->value('quantity');
                    $chavo = get_object_vars($value);
                    $chavo += ['id' => $id, 'price' => $price, 'description' => $desc, 'discount' => $discount, 'path' => $path, 'max' => $max];
                    $data += [$i => $chavo];
                    $i++;
                }
        }
        return view('products.cart')->with('data', $data);
    }

    public function setCookie(Request $request)
    {

        $productsData = $this->cookieService->getCartData('data');

        if (!Product::find($request->product_id)->exists())
            response()->json('Запрашиваемый продукт не найден на складе!', 404);

        if (Product::where('quantity', '<', $request->quantity))
            response()->json('Указанное количество товара не имеется на складе', 400);


        if (!$productsData)
            $productsData[] = $request->all();

        dd(implode(','));

        $this->cookieService->setCookie('data', implode('', $productsData));



        return redirect()->route('cart');
    }

    public function store(Request $request)
    {

        $data = $request->validate([
            'name' => 'required',
            'quantity' => 'required',
        ]);


        return Response::json($data);
    } */
}
