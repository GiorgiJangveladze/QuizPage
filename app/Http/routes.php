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

Route::get('/',['uses' => 'HomeController@index','as' => 'home']);
Route::get('/Test/{id}',['uses'=>'HomeController@test','as' => 'testPage']);
Route::post('/Test/{id}','HomeController@requesttest');
Route::post('/store',['uses' => 'HomeController@storeResult','as' => 'saveResult']);
Route::group(['middleware' =>'auth'],function()
{
	Route::group(['middleware'=>'admin','prefix' => 'admin'],function()
	{
		Route::get('/',['uses' => 'Admin\AdminController@index','as' => 'admin']);
		Route::post('/','Admin\AdminController@export');
		Route::get('/logout',['uses'=> 'Admin\AdminController@logout','as' => 'logout']);

		//Categories module routes Begin
			Route::get('/category/index',['uses' => 'Admin\CategoryController@index','as' => 'categoryindex']);
			Route::post('/category/edit',['uses'=>'Admin\CategoryController@categoryEdit','as' => 'categoryEdit']);
		//Categories module routes End

		//Quiz module routes Begin
			Route::get('/quiz',['uses' => 'Admin\QuizController@index','as' => 'quizIndex']);
			Route::get('/quiz/add',['uses'=>'Admin\QuizController@addQuiz','as' => 'addQuiz']);
			Route::post('/quiz/add','Admin\QuizController@addRequestQuiz');
			Route::get('/quiz/edit/{id}',['uses'=>'Admin\QuizController@editQuiz','as' => 'editQuiz']);#
			Route::post('/quiz/edit/{id}','Admin\QuizController@editRequestQuiz');
			Route::delete('/quiz/delete',['uses' => 'Admin\QuizController@deleteQuiz','as' => 'QuizDelete']);
		//Quiz module routes End

		//Question module routes Begin
			//Route::get('/question',['uses' => 'Admin\QuizController@index','as' => 'quizIndex']);
			Route::get('/question/add/{id}',['uses'=>'Admin\QuestionController@addQuestion','as' => 'addQuestion']);
			Route::post('/question/add/{id}','Admin\QuestionController@addRequestQuestion');
			Route::get('/question/edit/{id}',['uses'=>'Admin\QuestionController@editQuestion','as' => 'editQuestion']);
			Route::post('/question/edit/{id}','Admin\QuestionController@editRequestQuestion');
			Route::delete('/question/delete',['uses' => 'Admin\QuestionController@deleteQuestion','as' => 'deleteQuestion']);
		//Question module routes End

	});
});
Route::auth();

