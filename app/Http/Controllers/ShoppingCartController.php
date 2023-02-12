<?php

namespace App\Http\Controllers;

use App\Models\Image;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Response;

class ShoppingCartController extends Controller
{
        public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required',
        ]);
        return Response::json($data);
    }
}
