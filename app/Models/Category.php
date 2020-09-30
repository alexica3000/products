<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = ['title'];

    public static function getCategoriesList(int $parentId = null) : Collection
    {
        return self::where('parent', $parentId)->get();
    }

    public function children()
    {
        return $this->hasMany('App\Category', 'parent', 'id');
    }

    public function products()
    {
        return $this->belongsToMany('App\Product');
    }
}
