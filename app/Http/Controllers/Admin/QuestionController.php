<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Test;
use App\Models\Question;
class QuestionController extends Controller
{
    protected $quiz;
    protected $question;

    public function __construct()
    {
      $this->quiz = new Test();
      $this->question = new Question();
    }

    public function index()
    {	
    	//$_quiz = $this->quiz->get();
       
        return view('admin.modules.question.index',['quizzes' => $_quiz]);
    }

    public function addQuestion($quiz_id)
    {	
    	$_quiz = $this->quiz->find($quiz_id);
        $_questions = $this->question->where('test_id',$quiz_id)->get();
        return view('admin.modules.question.add',['quiz' => $_quiz,'questions' => $_questions]);
    }
    public function addRequestQuestion(Request $request,$quiz_id)
    {
         try
         {
            $_quiz = $this->quiz->find($quiz_id);  
            $question = $this->question;
            $question->title = $request->input('title');
            $question->answer = $request->input('answer');
            $Possibleanswer = $request->input('Possibleanswer');

            $question->a = $Possibleanswer[0];
            $question->b = $Possibleanswer[1];
            if(!empty($Possibleanswer[2]))
            {
               $question->g = $Possibleanswer[2];
            } 
            if(!empty($Possibleanswer[3]))
            {
                $question->d = $Possibleanswer[3];
            }
            if(!empty($Possibleanswer[4]))
            {
                $question->e = $Possibleanswer[4];
            } 
            $question->test_id = $quiz_id;
            $question->save();

            if($question->save())
               {
                  return back()->with('success','Question added');
               }else
               {
                 return back()->with('error','Question not added');   
               }
         }catch(Exception $ex)
         {
             return back()->with('error',$ex->getMessage());
         }
    }
    
    public function editQuestion($id)
    {
        $_question = $this->question->find($id);
        $_possibleAnswers = [$_question->a,$_question->b,$_question->g,$_question->d,$_question->e];
        return view('admin.modules.question.edit',['question' => $_question,'answersArray' => $_possibleAnswers]);
    }
    public function editRequestQuestion(Request $request,$id)
    {
        try
         {
            $question = $this->question->find($id);
            $question->title = $request->input('title');
            $question->answer = $request->input('answer');
            $Possibleanswer = $request->input('Possibleanswer');

            $question->a = $Possibleanswer[0];
            $question->b = $Possibleanswer[1];
            if(!empty($Possibleanswer[2]))
            {
               $question->g = $Possibleanswer[2];
            } 
            if(!empty($Possibleanswer[3]))
            {
                $question->d = $Possibleanswer[3];
            }
            if(!empty($Possibleanswer[4]))
            {
                $question->e = $Possibleanswer[4];
            } 
            $question->save();

            if($question->save())
               {
                  return back()->with('success','Question edited');
               }else
               {
                 return back()->with('error','Question not edited');   
               }
         }catch(Exception $ex)
         {
             return back()->with('error',$ex->getMessage());
         }
    }

    public function deleteQuestion(Request $request)
    {
        if($request->ajax())
        {
            $id = (int)$request->input('id');
            $_question = $this->question->find($id);
            $_question->delete();
        }
    }
}
