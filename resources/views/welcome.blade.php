@extends('layouts.app')

@section('content')

  @if(Auth::check())
  <div class="mt-4">
    @include('posts.posts', ['posts'=>$posts])
  </div>

  @else
  <div class="center jumbotron">
    <div class="text-center">
      <h1>WITH</h1>
    </div>
  </div>
    <div class="row">
      <div class="col-sm-6 offset-sm-3">
        {!! link_to_route('signup.get', '新規登録する', [], ['class'=>'btn btn-primary btn-block mt-4']) !!}
        {!! link_to_route('login', 'ログインする', [], ['class'=>'btn btn-success btn-block mt-3']) !!}
      </div>
    </div>
    
  @endif

@endsection