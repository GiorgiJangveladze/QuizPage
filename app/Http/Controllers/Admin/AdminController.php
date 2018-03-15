<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Auth;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class AdminController extends Controller
{
    
	// public function __construct()
	// {

	// }
	
	public function index()
   	{
   		return view('admin.layout.index');
   	}

    public function logout()
      {
         \Auth::logout();
         return redirect('home');
      }
}