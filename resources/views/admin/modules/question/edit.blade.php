@extends('admin.layout.index')
@section('content')
	<section class="content-header">
      <h1>
        Edit Question:
      </h1>
	</section>
	<section class="content">
		 @if ($errors->any())
		    <div class="callout callout-danger" >
		        <ul>
		            @foreach ($errors->all() as $error)
		                <li>{{ $error }}</li>
		            @endforeach
		        </ul>
		    </div>
		@endif
		<form method="post" action="">
	            {{ csrf_field() }}
		           	<div class="form-group 	@if ($errors->has('title')) has-error @endif">
			            <label>Question:</label>
			            <input type="text" class="form-control" name="title" value="@if(old('title')){{ old('title')}} @else {{ $question->title }} @endif" placeholder="2+2 = ?">
		            </div>
		            <div class="form-group 	@if ($errors->has('answer')) has-error @endif">
			            <label>Answer:</label>
			            <input type="text" class="form-control" name="answer" value="@if(old('answer')){{ old('answer')}} @else {{ $question->answer }} @endif" placeholder="4">
		            </div>
		             <h5>Add Answer:</h5>
		            <a class="btn btn-info" id="addAnswers" onclick="myAppendFunc()">Add possible answer</a>
		            <a class="btn btn-danger" id="removeAnswers" onclick="myRemoveFunc()">Remove possible answer</a>
	            	<div id="appendform" class="form-group 	@if ($errors->has('title')) has-error @endif">
	            		@for($i=0;$i < count($answersArray);$i++)
	            			@if(!empty($answersArray[$i]))
	            			<label>possible answer {{$i+1}})</label>
             			    <input type='text' class='form-control' name='Possibleanswer[{{$i}}]' placeholder='5' value="@if(old('Possibleanswer[$i]')){{ old('Possibleanswer[$i]')}} @else {{ $answersArray[$i] }} @endif">
	            			@endif
	            		@endfor
		        	</div>
		            <div class="form-group ">
		                <button type="submit" class="btn btn-primary btn-block">Store</button>
		            </div>
	            </form>
    </section>
@endsection
@section('footer')