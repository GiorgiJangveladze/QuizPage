<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    public $table = 'questions';
    public $timestamps = false;
    protected $fillable = ['title','a','b','g','d','e','answer'];
}
