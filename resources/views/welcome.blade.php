@extends('layouts.app')

@section('content')

  <div class="center jumbotron">
    <div class="text-center">
      <h1>WITH</h1>
      {!! link_to_route('signup.get', '新規登録する', [], ['class'=>'btn btn-primary mt-4']) !!}
    </div>
  </div>

@endsection