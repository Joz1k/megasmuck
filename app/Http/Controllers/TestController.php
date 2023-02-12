<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductCreateProdRequest;
use App\Models\Image;
use App\Models\Product;
use App\Models\ImageProduct;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

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

    /* public $product;
    public $image;
    public $imageProduct;

    public function __construct(Product $product, Image $image, ImageProduct $imageProduct)
    {
        $this->product = $product;
        $this->image = $image;
        $this->imageProduct = $imageProduct;
    }

    public function create()
    {
        return view('admin.addProduct.create');
    }

    public function createProd(ProductCreateProdRequest $request)
    {
        $product = new Product();
        $image = new Image();
        $compact = new ImageProduct();

        $productTable = $this->product->create($request->validated());

        if ($request->hasFile('image'))
            return redirect('/');


        $path = Storage::put('public', $request->image);


        $uploadPath = 'uploads/products/';

        $images = $image->images()->create([
            'path' => $path,
        ]);

        $compact->attachProduct()->create([
            'product_id' => $productTable->id,
            'image_id' => $images,
        ]);

        //$product->products()->attach($images);

        return redirect('products')->with('message', 'Товар добавлен');
    } */
}