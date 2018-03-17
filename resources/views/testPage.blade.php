@extends('layouts.app')
@section('content')
<div class="wraper">
	<div class="questions">
		<h1>{{$quiz->title}}</h1>
		  <input type="checkbox" class="read-more-state" id="post-2" />
	    	<ol class="read-more-wrap">
			  <form method="post" action="">
			  	 {{ csrf_field() }}
				    @foreach($questions as  $question)
				    <li>
		           		<div class="form-group">
				            <label>Question:{{$question->title}}</label>
				        </br>
				            @if(!empty($question->a))
				            <div class="answer">
				            	<input name="{{$question->id}}[]" type="radio" value="1">
				            	<label>{{$question->a}}</label>
				            </div>
				            	</br>
				            @endif
				            @if(!empty($question->b))
				            <div class="answer">
				            	<input name="{{$question->id}}[]" type="radio" value="2">
				            	<label>{{$question->b}}</label>
				            </div>
				            	</br>
				            @endif
				            @if(!empty($question->g))
				            <div class="answer">
				            	<input name="{{$question->id}}[]" type="radio" value="3">
				            	<label>{{$question->g}}</label>
				            </div>
				            	</br>
				            @endif
				            @if(!empty($question->d))
				            <div class="answer">
				            	<input name="{{$question->id}}[]" type="radio" value="4">
				            	<label>{{$question->d}}</label>
				            </div>
				            	</br>
				            @endif
				            @if(!empty($question->e))
				            <div class="answer">
				            	<input name="{{$question->id}}[]" type="radio" value="5">
				            	<label>{{$question->e}}</label>
				            </div>
				            	</br>
				            @endif
			            </div>
				    </li>
				    @endforeach

			   		<div class="form-group ">
		                <button type="submit" class="btn btn-primary btn-block">Done</button>
		            </div>
			   </form>
		    </ol>
	</div>
</div>
@endsection