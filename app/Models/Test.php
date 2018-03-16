<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Test extends Model
{
    public function categories()
	{
	 return $this->belongsToMany('App\Models\Category')->withTimestamps();
	}
	public function questions()
    {
        return $this->hasMany('App\Models\Question');
    }
}
