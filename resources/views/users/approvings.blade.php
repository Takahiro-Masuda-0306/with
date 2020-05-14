@extends('layouts.app')

@section('content')

  <div class="text-center mb-4">
    <p>{{$user->name}}さんがいいねした投稿 <span class="badge badge-secondary ml-2">{{ $count_approvings }}</span></p>
  </div>
  
  @if($count_approvings > 0)

    @include('posts.posts', ['posts'=>$approvings]) 

  @else

    <h4 class="text-center text-secondary">No Favorites</h4>  
  
  @endif
@endsection