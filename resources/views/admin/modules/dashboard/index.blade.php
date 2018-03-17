@extends('admin.layout.index')
@section('content')
	
	<section class="content-header">
      <h1>
        <form method="post" action=""> 
         {{ csrf_field() }}
         <input type="submit" name="export"  class="btn btn-info" value="Export Answers" >
        </form>
        <small>General information about our page</small>
      </h1>      
    </section>

    <section class="content">
    	 <!-- Small boxes (Stat box) -->
      <div class="row">
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-aqua">
            <div class="inner">
              <h3>{{$categories}}</h3>

              <p>Categories</p>
            </div>
            <div class="icon">
              <i class="fa fa-th-large"></i>
            </div>
            <a href="{!! route('categoryindex') !!}" class="small-box-footer">
              More info <i class="fa fa-arrow-circle-right"></i>
            </a>
          </div>
        </div>

        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-yellow">
            <div class="inner">
              <h3>{{$quizzes}}</h3>

              <p>Quizzes</p>
            </div>
            <div class="icon">
              <i class="fa  fa-file-text-o"></i>
            </div>
            <a href="{!! route('quizIndex') !!}" class="small-box-footer">
              More info <i class="fa fa-arrow-circle-right"></i>
            </a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-red">
            <div class="inner">
              <h3>{{$questions}}</h3>

              <p>Questions  count</p>
            </div>
            <div class="icon">
              <i class="fa fa-question"></i>
            </div>
            <a class="small-box-footer">
              Coming soon <i class="fa fa-arrow-circle-right"></i>
            </a>
          </div>
        </div>
        <!-- ./col -->
      
      
          <div class="col-xs-12">
                <div class="box">
            <div class="box-body">
              <table class="table table-bordered table-hover">
                <thead>
                  <tr>
                    <th>Quizz</th>
                    <th>Name</th>
                    <th>Questions</th>
                    <th>Right answers</th>
                  </tr>
                </thead>
                <tbody>
                @foreach($answers as $answer)
                <tr>
                  <td>{{$answer->quiz_title}}</td>
                  <td>{{$answer->name}}</td>
                  <td>{{$answer->question_count}}</td>
                  <td>{{$answer->right_answers}}</td>
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
@section('footხer')