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

    public static function saveProduct(array $productData) : Product
    {
        $product = self::create($productData);
        $product->categories()->sync($productData['categories_id']);

        return $product;
    }

    public static function updateProduct(array $productData, Product $product) : Product
    {
        $product->update($productData);
        $product->categories()->sync($productData['categories_id']);

        return $product;
    }
}
