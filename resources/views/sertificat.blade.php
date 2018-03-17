@extends('layouts.app')
@section('content')
 <div class="certificate">
 		<h1>{{$quiz->title}}</h1>
 		<h3>Questions count:{{$questions}}</h1>
 		<h3>Right answers:{{$answers}}</h1>
 		<h5>When you save your record, it automatically exports to the excel</h5>
 			<form action="{!! route('saveResult') !!}" method="post">
 				{{ csrf_field() }}
 				<label>Name</label>
 				<input type="text" name="name">
 				<input type="hidden" name="questionsCount" value="{{$questions}}">
 				<input type="hidden" name="answersCount" value="{{$answers}}">
 				<input type="hidden" name="quizTitle" value="{{$quiz->title}}">
 				<input type="submit" name="save" value="Save">
 			</form>
 </div>
@endsection
