<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Requests\CategoryRequest;
use App\Http\Controllers\Controller;
use App\Models\Category;

class CategoryController extends Controller
{
    protected $category;

    public function __construct()
    {
    	$this->category = new Category();
    	
    }

    public function index()
    {	
    	$_categories = $this->category->get();
       
        return view('admin.modules.category.index',['categories' => $_categories]);
    }

    public function categoryEdit(CategoryRequest $request)
    {
    	 try
        {
            $id = $request->input('id');
            $_category = $this->category->find($id);
            $_category->name = $request->input('name');
            $_category->save();
            
            
            if($_category->save())
            {
                return response()->json(['code'=>200,'success' => 'Social Icon Edited']);
            }
            return response()->json(['code'=>200,'error' => 'Social icon not edited']);

        }catch(Exveption $ex)
        {
            \Log::error($ex->getMessage());
            return back()->with('error',$ex->getMessage()); 
        }
     }
}
