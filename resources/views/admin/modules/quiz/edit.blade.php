@extends('admin.layout.index')
@section('content')
	<section class="content-header">
      <h1>
        Edit	 Quizz
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
		<div class="box-body"">
	            <form method="post" action="" enctype="multipart/form-data" >
	            {{ csrf_field() }}
		            <div class="form-group 	@if ($errors->has('title')) has-error @endif">
			            <label>Title</label>
			            <input type="text" class="form-control" name="title" value="@if(old('title')){{ old('title')}} @else {{ $quiz->title }} @endif" placeholder="Title">
		            </div>
				 	
				 	<div class="form-group @if ($errors->has('image')) has-error @endif"" >
                  		<label for="exampleInputFile">Upload image</label>
                  		<input type="file" id="exampleInputFile" name="image">
                	</div>

				    <div class="form-group 	@if ($errors->has('category')) has-error @endif">
			            <label>Project Category</label>
		               <select class="form-control" name="category">
		               		@foreach($categoriesList as $category)
		               			<option value="{{$category->id}}" @if($categories->contains($category)) selected @endif>{{$category->name}}</option>
		               		@endforeach
		               </select>
		            </div>
		            	<!-- <h4>Questions:</h4>
			            <div id="addQuestions">
		                 	<div class="form-group">
		                 		<input type="text" id="questionNumber" class="form-control" placeholder="number of questions:1,10,30,40...">
			            	 </div>
				              	<a  class="btn btn-info" onclick="myAppendFunc()">Add Question</a>
				        </div>
			        </div>
			        <div class="form-group" id="questionList">
			        	
			        </div> -->
		            <div class="form-group ">
		                <button type="submit" class="btn btn-primary btn-block">Edit</button>
		            </div>
	            </form>
            </div>
	</section>
@endsection
@section('footer')