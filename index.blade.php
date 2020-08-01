<!--「PHP/Laravel 19」課題1より作成-->

@extends('layouts.front')

@section('content')
  <div class="container">
    <hr color="#c0c0c0">
    <div class="row">
      <div class="profiles col-md-8 mx-auto mt-3">
        @foreach($profiles as $profile)
          <div class="profiles">
            <div class="row">
              <div class="text col-md-6">
                
                <div class="title name">
                  {{ str_limit($profile->name, 50) }}
                </div>
                <div class="gender">
                  {{ str_limit($profile->gender, 15) }}
                </div>
                <div class="hobby mt-3">
                  {{ str_limit($profile->hobby, 100) }}
                </div>
                <div class="introduction mt-3">
                  {{ str_limit($profile->introduction, 1500) }}
                </div>
                
              </div>
            </div>
          </div>
          <hr color="#c0c0c0">
        @endforeach
      </div>
    </div>
  </div>
@endsection