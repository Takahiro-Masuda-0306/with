@extends('layouts.app')

@section('content')

  <div class="text-center mb-4">
    <h1>{{$user->name}}の詳細ページ</h1>
  </div>
  
  <div class="row">
    <div class="col-sm-6 offset-sm-3">
      <div class="image mb-2">
        <p>プロフィール画像</p>
        <p>{{$user->image}}</p>
      </div>
      
      <div class="name mb-2">
        <p>お名前</p>
        <p>{{$user->name}}</p>
      </div>
      
      <div class="age mb-2">
        <p>生年月日</p>
        <p>{{$user->age}}</p>
      </div>
      
      @if(Auth::user()->id === $user->id)
        <p>情報を編集しますか？ {{link_to_route('users.edit', '編集する', ['id'=>$user->id]) }}</p>
      @endif
    </div>
  </div>

@endsection