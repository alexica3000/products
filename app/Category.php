<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
// use App\Category;

class category extends Model
{
	protected $fillable = ['title'];

	// public function parents()
    // {
    //     return $this->belongsTo('App\Category', 'parent', 'id');
    // }

    public function children()
    {
        return $this->hasMany('App\Category', 'parent', 'id');
    }
	
	public function products()
	{
		return $this->belongsToMany('App\Product');
	}
}
