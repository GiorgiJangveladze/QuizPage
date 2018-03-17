<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use App\Models\Test;
use App\Models\Question;
use App\Models\Category;
use App\Models\Answer;
class HomeController extends Controller
{
    
    protected $quiz;
    protected $category;
    protected $question;
    protected $excel;
    protected $answer;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->quiz = new Test();
        $this->category = new Category();
        $this->question = new Question();
        $this->answer = new Answer();
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home',['categories' => $this->category->get(),'quizzes' => $this->quiz->get()]);
    }

    public function test($id)
    {
        $_quiz = $this->quiz->find($id);
        $_questions = $this->question->where('test_id',$id)->get();
        return view('testPage',['quiz' => $_quiz,'questions' => $_questions]);
    }

    public function requesttest(Request $request,$id)
    {
        $_quiz = $this->quiz->find($id);
        $_questions = $this->question->where('test_id',$id)->get();
        $count = 0;
        foreach($_questions as $question)
        {

            if($question->answer == $request[$question->id][0])
            {
                $count++;
            }
        }
        return view('sertificat',['questions'=> count($_questions),'answers' => $count,'quiz' =>$_quiz]);
    }

    public function storeResult(Request $request)
    {
        $_answers = $this->answer; 
        $_answers->name = $request->name;            
        $_answers->question_count = $request->input('questionsCount');
        $_answers->right_answers = $request->input('answersCount');
        $_answers->quiz_title = $request->input('quizTitle');
        if($_answers->save())
            {
                return redirect()->route('home');
            }
            return redirect()->route('home');
    }
}
