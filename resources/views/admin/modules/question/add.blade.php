@extends('admin.layout.index')
@section('content')
	<section class="content-header">
      <h1>
        Quiz:{{$quiz->title}}
      </h1>
	</section>
	<section class="content">
		 <div class="box-header" id="showQbutton">
		 <h5>Add Question:</h5>
          <a class="btn btn-info" onclick="showQuestionForm()">Add Question</a>
		</div>
		 @if ($errors->any())
		    <div class="callout callout-danger" >
		        <ul>
		            @foreach ($errors->all() as $error)
		                <li>{{ $error }}</li>
		            @endforeach
		        </ul>
		    </div>
		@endif
		<div class="box-body hidde" id="addQuestionform">
	            <form method="post" action="">
	            {{ csrf_field() }}
		           	<div class="form-group 	@if ($errors->has('title')) has-error @endif">
			            <label>Question:</label>
			            <input type="text" class="form-control" name="title" value="{{ old('title') }}" placeholder="2+2 = ?">
		            </div>
		            <div class="form-group 	@if ($errors->has('answer')) has-error @endif">
			            <label>Answer:</label>
			            <input type="text" class="form-control" name="answer" value="{{ old('answer') }}" placeholder="4">
		            </div>
		            <h5>Add Answer:</h5>
		            <a class="btn btn-info" id="addAnswers" onclick="myAppendFunc()">Add possible answer</a>
		            <a class="btn btn-danger" id="removeAnswers" onclick="myRemoveFunc()">Remove possible answer</a>
	            	<div id="appendform" class="form-group 	@if ($errors->has('title')) has-error @endif">

		        	</div>
		            

		            <div class="form-group ">
		                <button type="submit" class="btn btn-primary btn-block">Store</button>
		            </div>
	            </form>
        </div>

        <div class="row">
		        <div class="col-xs-12">
		          <div class="box">
					<div class="box-body">
						<table class="table table-bordered table-hover">
							<thead>
								<tr>
									<th>Question</th>
									<th>Answer</th>
									<th>A</th>
									<th>B</th>
									<th>C</th>
									<th>D</th>
									<th>E</th>
									<th>Edit</th>
									<th>Delete</th>
								</tr>
							</thead>
							<tbody>
							@foreach($questions as $question)
							<tr>
								<td>{{$question->title}}</td>
								<td>{{$question->answer}}</td>
								<td>{{$question->a}}</td>
								<td>{{$question->b}}</td>
								<td>{{$question->g}}</td>
								<td>{{$question->d}}</td>
								<td>{{$question->e}}</td>
								<td><a href="{!! route('editQuestion',['id' => $question->id]) !!}">Edit</a></td>
								<td><a href="javascript:;" onclick="deletefunction('/admin/question/delete',this)" rel="{{$question->id}}" >Delete</a></td>
							</tr>
							@endforeach
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</section>
@endsection
@section('footer')