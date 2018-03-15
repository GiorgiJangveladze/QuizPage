<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Requests;
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

    public function stroreCategory(Request $request)
    {
    	return true;
    }

    public function editCategory(Request $request,$id)
    {
    	return true;
    }
}
