<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;

class CookieController extends Controller
{
    public function index()
    {
        $data= Cookie::get('data');
        $bro=json_decode($data);
        if ($bro != false) {
            $bro=json_decode($data);
        foreach ($bro as $key => $value) {
            $i = Product::select('description', 'price', 'discount')->where('name', '=', $value->name)->get();
                dd($i);
                $valy->update([
                    'description' =>
                ]);
            }
        }
        return view('products.cart')->with('data', $bro);
    }

    public function setCookie(Request $request)
    {
        if (isset($_COOKIE['data'])) {
            $data= Cookie::get('data');
        $bro=json_decode($data, true);
        if (((($request->quantity)) <= (Product::where('name', '=', $request->name)->get('quantity'))) && ((Product::where('name', '=', $request->name)->get('quantity')) != false)) {
            setcookie('data', json_encode($bro + [array_key_last($bro) + 1 => ['name' => $request->name, 'quantity' => $request->quantity]]), time() + (86400 * 30));
            foreach ($bro as $key => $value) {
                if ($bro[$key]['name'] == $request->name) {
                    if ((($bro[$key]['quantity'] + $request->quantity) >= Product::where('name', '=', $request->name)->value('quantity')) && ((Product::where('name', '=', $request->name)->value('quantity')) != false)) {
                        $bro[$key]['quantity'] = Product::where('name', '=', $request->name)->value('quantity');
                    } else {
                        $bro[$key]['quantity'] += $request->quantity;
                    }
                    setcookie('data', json_encode($bro), time() + (86400 * 30));
                }
            }
        }
        } else {
        setcookie('data', json_encode([0 => ['name' => $request->name, 'quantity' => $request->quantity]]), time() + (86400 * 30));
    }
        return redirect()->route('cart');
    }
}
