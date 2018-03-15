<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Quiz extends Model
{
    public function categories()
	{
		public $table = 'quiz';
   		protected $fillable = ['image','title'];
	    return $this->belongsToMany('App\Models\Category')
	      ->withTimestamps();
	}
}
