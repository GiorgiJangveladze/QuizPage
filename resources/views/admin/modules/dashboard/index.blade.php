@extends('admin.layout.index')
@section('content')
	
	<section class="content-header">
      <h1>
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
      </div>

    </section>
@endsection
@section('footხer')