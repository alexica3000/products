<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class category extends Model
{
	protected $fillable = ['title'];
	
	public function products()
	{
		return $this->belongsToMany('App\Product');
	}
}
