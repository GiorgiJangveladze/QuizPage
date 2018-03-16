<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\QuizRequest;
use App\Http\Requests\QuizRequestWithoutimg;
use App\Http\Controllers\Controller;
use App\Models\Test;
use App\Models\Category;

class QuizController extends Controller
{
    protected $quiz;
    protected $category;

    public function __construct()
    {
    	$this->quiz = new Test();
      $this->category = new Category();
    }

    public function index()
    {	
    	$_quiz = $this->quiz->get();
       
        return view('admin.modules.quiz.index',['quizzes' => $_quiz]);
    }

    public function addQuiz()
    {

        $_category = $this->category->get();
        return view('admin.modules.quiz.add',['categories' => $_category]);
    }
    
    public function addRequestQuiz(QuizRequest $request)
    {
       try
         {
             $img = $request->file('image');
             $destination_path = 'images/quizz/';
             $imgname = rand().$img->getClientOriginalName();
             $img->move($destination_path, $imgname);
             $_quiz = $this->quiz;
             $_quiz->image = $imgname;            
             $_quiz->title = $request->input('title');
             $_quiz->save();
             $category = $request->input('category');
             $_quiz->categories()->attach($category);
            
             if($_quiz->save())
              {
                 return redirect('/admin/question/add/'.$_quiz->id)->with('success','Quiz added');
              }else
              {
                return back()->with('error','Quiz not added');   
              }
         }catch(Exception $ex)
         {
             return back()->with('error',$ex->getMessage());
         }
    }
    
    public function editQuiz($id)
    {
        $_quiz = $this->quiz->find($id);
        if(!$_quiz)
        {
            return abort(404); 
        }
        if ($_quiz->categories->count() > 0)
        {
            $categories = $_quiz->categories;
        }
       
        return view('admin.modules.quiz.edit',['quiz' => $_quiz,'categories' => $categories,'categoriesList' => $this->category->get()]);
    }

     public function editRequestQuiz(QuizRequestWithoutimg $request,$id)
    {
        try
        {
            $_quiz = $this->quiz->find($id);
            $category = $request->input('category');
            if($_quiz->categories !=  $category)
            {
              $_quiz->categories()->detach($_quiz->categories);
              $_quiz->categories()->attach($category);
              //$_quiz->categories()->sync($categories);bevri categoris shemtxveva (cooming soon)
            }

            $_quiz->title = $request->input('title'); 
            if( $request->hasFile('image') )
            {
                if(\File::exists('images/quizz/'.$_quiz->image))
                {
                    \File::Delete('images/quizz/'.$_quiz->image);
                }

                $img = $request->file('image');
                $destination_path = 'images/quizz/';
                $imgname = rand().$img->getClientOriginalName();
                $img->move($destination_path, $imgname);            
                $_quiz->image = $imgname;
                $_quiz->save();
             }

            
            if($_quiz->save())
            {
                return back()->with('success','Quiz edited');//redirect()->route('services')->with('success','service added');
            }
            return back()->with('error','Quiz not edited');   

        }catch(Exception $ex)
        {
            return back()->with('error',$ex->getMessage());
        }
    }

    public function deleteQuiz(Request $request)
    {
        if($request->ajax())
        {
            $id = (int)$request->input('id');
            $_quiz = $this->quiz->where('id',$id)->first();

            if(\File::exists('images/quizz/'.$quiz->image))
            {
                \File::Delete('images/quizz/'.$item->image);
            }

            if($_quiz->categories->count() > 0)
            {
                $_quiz->categories()->detach();
            }
            $_quiz->delete();
        }
    }
}
