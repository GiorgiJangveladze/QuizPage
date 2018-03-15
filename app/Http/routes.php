<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::group(['middleware' =>'guest'],function()
{
	Route::get('/login',function()
	{
		return view('auth.login');
	});
});

Route::group(['middleware' =>'auth'],function()
{
	Route::group(['middleware'=>'admin','prefix' => 'admin'],function()
	{
		Route::get('/',['uses' => 'Admin\AdminController@index','as' => 'admin']);
		Route::get('/logout',['uses'=> 'Admin\AdminController@logout','as' => 'logout']);

		//Categories module routes Begin
			Route::get('/category/index',['uses' => 'Admin\CategoryController@index','as' => 'categoryindex']);
			Route::post('/category/add','Admin\CategoryController@stroreCategory');
			Route::post('/category/edit','Admin\CategoryController@editCategory');
			Route::delete('/category/edit',['uses' => 'Admin\CategoryController@deleteCategory','as' => 'categoryDelete']);
		//Categories module routes End
	});
});

Route::auth();

// Route::get('/home', 'HomeController@index');
Route::get('admin/example',function()
{
	return view('admin.example');
});

