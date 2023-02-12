<?php

namespace App\Models;

use App\Models\Image;
use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ImageProduct extends Model
{
    use HasFactory;

    protected $table = 'image_products';
    protected $guarded = false;

    public function attachProduct()
    {
        return $this->belongsTo(ImageProduct::class, 'id', 'product_id');
    }
}
