@extends('layouts.app')

@section('content')

  <div class="text-center mb-4">
    <h1>{{$user->name}}の編集ページ</h1>
  </div>
  
  <div class="row">
    <div class="col-sm-6 offset-sm-3">
      {!! Form::model($user, ['route'=>['users.update', $user->id], 'method'=>'put']) !!}
      
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
          {!! Form::date('age', old('age'), ['class'=>'form-control']) !!}
        </div>
        
        {!! Form::submit('更新する', ['class'=>'btn btn-primary btn-block mt-3 mb-3']) !!}
        
      {!! Form::close() !!}
    </div>
  </div>

@endsection