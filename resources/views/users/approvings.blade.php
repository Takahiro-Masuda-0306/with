@extends('layouts.app')

@section('content')

  <div class="text-center mb-4">
    <p>{{$user->name}}さんのいいねした投稿</p>
  </div>

  @include('posts.posts', ['posts'=>$approvings]) 

@endsection