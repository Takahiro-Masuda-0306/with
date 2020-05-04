@extends('layouts.app')

@section('content')

  <div class="text-center mb-4">
    <h1>新規登録ページ</h1>
  </div>
  
  <div class="row">
    <div class="col-sm-6 offset-sm-3">
      {!! Form::open(['route'=>'signup.post']) !!}
        
        <div class="form-group">
          {!! Form::label('image', 'プロフィール画像') !!}
          <p>{!! Form::file('image', old('image'), ['class'=>'file-control']) !!}</p>
        </div>
        
        <div class="form-group">
          {!! Form::label('name', 'お名前') !!}
          {!! Form::text('name', old('name'), ['class'=>'form-control']) !!}
        </div>
        
        <div class="form-group">
          {!! Form::label('email', 'メールアドレス') !!}
          {!! Form::email('email', old('email'), ['class'=>'form-control']) !!}
        </div>
        
        <div class="form-group">
          {!! Form::label('age', '生年月日') !!}
          <p>{!! Form::date('age', old('age')) !!}</p>
        </div>
        
        <div class="form-group">
          {!! Form::label('password', 'パスワード') !!}
          {!! Form::password('password', ['class'=>'form-control']) !!}
        </div>
        
        <div class="form-group">
          {!! Form::label('password_confirmation', '確認用パスワード') !!}
          {!! Form::password('password_confirmation', ['class'=>'form-control']) !!}
        </div>
        
        {!! Form::submit('新規登録する', ['class'=>'btn btn-primary btn-block mt-3 mb-3']) !!}
        
      {!! Form::close() !!}
    </div>
  </div>
  

@endsection