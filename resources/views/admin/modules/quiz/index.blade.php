@extends('admin.layout.index')
@section('content')
	<section class="content-header">
      <h1>
       Quiz List
      </h1>      
	</section>
	<section class="content">
		      <div class="row">
		        <div class="col-xs-12">
		          <div class="box">
					<div class="box-body">
						<div class="box-header">
				              <a href="{!! route('addQuiz') !!}" class="btn btn-info">Add</a>
				         </div>
						<table class="table table-bordered table-hover">
							<thead>
								<tr>
									<th>Title</th>
									<th>Image</th>
									<th>Categories</th>
								</tr>
							</thead>
							<tbody>
							@foreach($quizzes as $quizz)
							<tr>
								<td>{{$quizz->title}}</td>
								<td><img src="{{asset('images/quizz/'.$quizz->image)}}" width="50px" height="50px" alt="img"></td>
								<td>
									@if ($quizz->categories->count() > 0)

									  <ul style="list-style-type: none;">

									  @foreach($quizz->categories as $category)

									    <li >{{ $category->name }}</li>

									  @endforeach

									  </ul>

									@endif
								</td>
								<td><a href="{!! route('addQuestion',['id' => $quizz->id]) !!} ">Questions</a></td>
								<td><a href="{!! route('editQuiz',['id' =>$quizz->id]) !!}">Edit</a></td>
								<td><a href="javascript:;" onclick="deletefunction('/admin/quiz/delete',this)" rel="{{$quizz->id}}" >Delete</a></td>
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