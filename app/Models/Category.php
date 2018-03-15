<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    public $table = 'categories';
    protected $fillable = ['name'];

    public function Quiz()
	{
	    return $this->belongsToMany('App\Models\Quiz')
	      ->withTimestamps();
	}
}
