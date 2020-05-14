@extends('layouts.app')

@section('content')

  <div class="text-center mb-4">
    <h1>新規投稿ページ</h1>
  </div>
  
  <div class="row pb-4">
    <div class="col-sm-6 offset-sm-3">
      
      {!! Form::model($post, ['route'=>['posts.store'], 'method'=>'post', 'enctype' => 'multipart/form-data']) !!}
      
        <div class="form-group form-image">
          {!! Form::label('image', '写真') !!}
          {!! Form::file('image', old('image'), ['class'=>'form-control', 'id'=>'image']) !!}
        </div>
        
        <div class="prev-image mb-3 drop-area text-secondary small">
          <p>ここにプレビューが表示されます。</p>
        </div>
        
        <progress class="small mb-2" value="0" max="100"></progress>
        
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