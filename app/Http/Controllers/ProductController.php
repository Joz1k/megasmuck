<?php

namespace App\Http\Controllers;

use App\Models\Image;
use App\Models\Product;
use App\Models\ImageProduct;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    /* public function index()
    {
        return view('admin.addProduct.index');
    } */

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.addProduct.create');
    }

    public function createProd(Request $request)
    {

        $data = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|decimal:0,2|gte:0',
            'quantity' => 'required|integer|gte:0',
            'image' => 'required|image|mimes:jpg,png,jpeg|min:2|max:2000'
        ]);


        $data = $request->all();

        $product = new Product();
        $image = new Image();
        $compact = new ImageProduct();

        $productTable = $product->products()->create([
            'name' => $data['name'],
            'description' => $data['description'],
            'price' => $data['price'],
            'quantity' => $data['quantity'],
        ]);

        if ($request->hasFile('image')) {
            $uploadPath = 'uploads/products/';

            $extention = $request->file('image')->getClientOriginalExtension();
            $filename = time() . '.' . $extention;
            $request->file('image')->move($uploadPath, $filename);
            $finalImagePathName = $uploadPath . $filename;

            $images = $image->images()->create([
                'path' => $finalImagePathName,
            ]);
        }

        $compact->attachProduct()->create([
            'product_id' => $productTable['id'],
            'image_id' => $images['id'],
        ]);

        //$product->products()->attach($images);

        return redirect('products')->with('message', 'Товар добавлен');
    }

}
