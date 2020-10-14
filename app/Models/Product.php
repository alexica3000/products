<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = ['title', 'description', 'price'];

    public function categories()
    {
        return $this->belongsToMany(Category::class);
    }

    public static function addProduct(array $productData)
    {
//        $product = self::create($productData);
//        $product->categories()->sync($request->category);
    }
}
