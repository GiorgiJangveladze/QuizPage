@extends('layouts.app')

@section('content')

          <div class="wraper">
            <div class="iso-nav">
              <ul>
                <li  class="active" data-filter="*">All</li>
                <li data-filter=".math">MATH</li>
                <li data-filter=".biol">bIOL</li>
                <li data-filter=".prog">Prog</li>
              </ul>
            </div>
            <div class="main-iso">
              <div class="item math">
                <img src="images/quizz/10561Screenshot_5.png" alt="">
              </div>
              <div class="item biol">
                <img src="images/quizz/10561Screenshot_5.png" alt="">
              </div>
              <div class="item biol">
                <img src="images/quizz/10561Screenshot_5.png" alt="">
              </div>
              <div class="item Prog">
                <img src="images/quizz/10561Screenshot_5.png" alt="">
              </div>


            </div>
          </div>


@endsection