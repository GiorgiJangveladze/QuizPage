<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Auth;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Test;
use App\Models\Category;
use App\Models\Question;
use App\Models\Answer;
use Excel;

class AdminController extends Controller
{
    protected $quiz;
    protected $category;
    protected $question; 
    protected $answer;
  public function __construct()
  	{
      $this->quiz =  new Test();
      $this->category =  new Category();
      $this->question =  new Question();
      $this->answer =  new Answer();
  	}

	public function index()
   	{
   		return view('admin.modules.dashboard.index',['quizzes' => $this->quiz->count(),'categories' => $this->category->count(),'questions' => $this->question->count(),'answers' => $this->answer->get()]);
   	}
  public function export()
  {
    try
    {
       $exp =  Excel::create('answers',function($excel)
                     {
                        $excel->sheet('answers',function($sheet)
                        {
                            $answers = \App\Models\Answer::all();
                            $sheet->fromModel($answers);         
                });
        })->export('xlsx');
    }catch(Exception $ex)
         {
             return back()->with('error',$ex->getMessage());
         }
  }
  public function logout()
    {
       \Auth::logout();
       return redirect('home');
    }
}
