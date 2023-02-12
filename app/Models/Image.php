<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    use HasFactory;

    protected $table = 'images';
    protected $guarded = false;

    public function images()
    {
        return $this->belongsTo(Image::class, 'image_id', 'id');
    }
}
