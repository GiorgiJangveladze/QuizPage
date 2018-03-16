<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    public function tests()
	{
	    return $this->belongsToMany('App\Models\Test')->withTimestamps();
	}
}
