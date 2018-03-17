@extends('layouts.app')

@section('content')
       <div class="test-wraper">
            <div class="iso-nav">
              <ul>
                <li  class="active" data-filter="*">All</li>
                @foreach($categories as $category)
                <li data-filter=".{{$category->id}}">{{$category ->name}}</li>
                @endforeach
              </ul>
            </div>
            <div class="main-iso">
              @foreach($quizzes as $quiz)
              <div class="item @foreach($quiz->categories as $obj){{$obj->id}}   @endforeach">
                <a href="{!! route('testPage',['id' => $quiz->id]) !!}">
                  <img src="{{asset('images/quizz/'.$quiz->image)}}" alt="img">
                </a>
              </div>
              @endforeach
            </div>
          </div>
@endsection
