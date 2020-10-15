<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = ['title', 'p_id'];

    public static function getCategoriesList(int $pId = null) : Collection
    {
        return self::where('p_id', $pId)->get();
    }

    public function children()
    {
        return $this->hasMany(self::class, 'p_id', 'id');
    }

    public function products()
    {
        return $this->belongsToMany(Product::class);
    }

     public function parents()
     {
         return $this->belongsTo(self::class, 'p_id', 'id');
     }

}
