@extends('layouts.app')

@section('content')

  <div class="text-center mb-4">
    <h1>新規投稿ページ</h1>
  </div>
  
  <div class="row">
    <div class="col-sm-6 offset-sm-3">
      
      {!! Form::model($post, ['route'=>['posts.store'], 'method'=>'post', 'enctype' => 'multipart/form-data']) !!}
      
        <div class="form-group">
          {!! Form::label('image', '写真') !!}
          {!! Form::file('image') !!}
        </div>
        
        <div class="form-group">
          {!! Form::label('title', 'タイトル') !!}
          {!! Form::text('title', old('title'), ['class'=>'form-control']) !!}
        </div>
        
        <div class="form-group">
          {!! Form::label('description', '説明') !!}
          {!! Form::text('description', old('description'), ['class'=>'form-control']) !!}
        </div>
        
        {!! Form::submit('投稿する', ['class'=>'btn btn-primary btn-block']) !!}
      
      {!! Form::close() !!}
      
    </div>
  </div>

@endsection