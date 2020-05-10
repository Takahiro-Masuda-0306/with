@extends('layouts.app')

@section('content')

  @include('commons.flash_messages')

  <div class="row pt-4 mb-4 pb-4">
    <div class="col-sm-8 offset-sm-2">
      @if($user->image) 
        <img class="rounded-circle img-fluid" width="70px" height="70px" src="{{ secure_asset('storage/' . $user->image) }}">
      @else 
        <img class="rounded-circle img-fluid" width="100px" height="100px" src="{{ secure_asset('storage/no-image.jpg') }}">
      @endif
      
      <h4 class="font-weight-bold mt-1 mb-1">{{$user->name}}</h4>      
      <span class="text-secondary">{{$user->age}}</span>
      
      @if(Auth::user()->id === $user->id)
        {{link_to_route('users.edit', '編集する', ['id'=>$user->id], ['class'=>'badge badge-primary text-white ml-1']) }}
      @endif
      
      <div class="wrap-text mt-2">
        {{ $user->description }}
      </div>
      
    </div>
  </div>
  
  @include('posts.posts', ['posts'=>$posts])

@endsection