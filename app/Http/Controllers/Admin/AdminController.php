<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Auth;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Test;
use App\Models\Category;
use App\Models\Question;

class AdminController extends Controller
{
    protected $quiz;
    protected $category;
    protected $question; 

  public function __construct()
  	{
      $this->quiz =  new Test();
      $this->category =  new Category();
      $this->question =  new Question();
  	}

	public function index()
   	{
   		return view('admin.modules.dashboard.index',['quizzes' => $this->quiz->count(),'categories' => $this->category->count(),'questions' => $this->question->count()]);
   	}

  public function logout()
    {
       \Auth::logout();
       return redirect('home');
    }
}
