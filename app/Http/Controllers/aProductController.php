<?php

namespace App\Http\Controllers;
use App\Models\Product;
use Illuminate\Http\Request;

class aProductController extends Controller
{
    public function show(Product $post)
    {
        $post1 = $post->join('images', 'products.id', '=', 'images.id')->where('products.id', '=', $post->id)->first();

        return view('products.show', compact('post1'));
    }
}
