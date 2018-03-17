<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
    protected $fillable = 
    [
    	'name','question_count','right_answers','quiz_title'
    ];
}
