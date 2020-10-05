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
}
