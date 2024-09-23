<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'category',
        'description',
        'price',
        'visibility',
        'discount',
        'stock',
        'thumbnail',
        'user_id'
    ];

    public function images()
    {

        return $this->hasMany(Image::class);

    }

}
