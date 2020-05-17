@extends('layouts.app')

@section('content')

  <div class="row pt-4 mb-4 pb-4">
    <div class="col-sm-8 offset-sm-2">
      <img class="rounded-circle img-fluid" width="70px" height="70px" src="{{ $user->image }}">
      
      <h4 class="font-weight-bold mt-1 mb-1">{{$user->name}}</h4>      
      <span class="text-secondary">{{$user->age}}</span>
      
      @if(Auth::user()->id === $user->id)
        {{link_to_route('users.edit', '編集する', ['id'=>$user->id], ['class'=>'badge badge-primary text-white ml-1']) }}
      @endif
      
      <div class="text-secondary mt-2 d-flex flex-row justify-content-between">
        <p>{{ link_to_route('users.show', $count_posts . '投稿', ['id'=>$user->id]) }}</p>
        <p>{{ link_to_route('users.approvings', $count_approvings . 'いいね', ['id'=>$user->id]) }}</p>
        <p>{{ link_to_route('users.commentings', $count_comments . 'コメント', ['id'=>$user->id]) }}</p>
      </div>
      
      <div class="wrap-text mt-2">
        {{ $user->description }}
      </div>
      
    </div>
  </div>
  
  @if($count_posts > 0)
    @include('posts.posts', ['posts'=>$posts])
  
  @else
    <h4 class="text-center text-secondary mb-3">No Posts</h4>  
    <div class="text-center">
      {{ link_to_route('posts.create', '投稿する', [], ['class'=>'btn btn-primary']) }}
    </div>
    
  
  @endif

@endsection