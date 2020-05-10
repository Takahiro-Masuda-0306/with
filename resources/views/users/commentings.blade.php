@extends('layouts.app')

@section('content')

  <div class="text-center mb-4">
    <p>{{$user->name}}さんのコメント一覧 <span class="badge badge-secondary ml-2">{{ $count_comments }}</span></p>
  </div>
  
  @include('comments.comments', ['comments' => $comments])

@endsection