@extends('layouts.app')

@section('content')

  <div class="text-center mb-4">
    <h5>{{$user->name}}の編集ページ</h5>
  </div>
  
  <div class="row pt-4 mt-4 bg-white rounded">
    <div class="col-sm-6 offset-sm-3">
      {!! Form::model($user, ['route'=>['users.update', $user->id], 'method'=>'put', 'enctype' => 'multipart/form-data']) !!}
      
        <div class="form-group">
          <figure>
            @if($user->image) 
              <img class="rounded img-fluid" width="100px" height="100px" src="{{ secure_asset('storage/' . $user->image) }}">
              <figcaption>現在のプロフィール画像</figcaption>
            @else 
              <img class="rounded img-fluid" width="100px" height="100px" src="{{ secure_asset('storage/no-image.jpg') }}">
            @endif
            
          </figure>
          {!! Form::label('image', 'ユーザー画像') !!}
          {!! Form::file('image', old('image'), ['class'=>'form-control']) !!}
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
          {!! Form::date('age', old('age'), ['class'=>'form-control']) !!}
        </div>
        
        <div class="form-group">
          {!! Form::label('description', '簡単な自己紹介') !!}
          {!! Form::textarea('description', old('description'), ['class'=>'form-control', 'rows'=>'5']) !!}
        </div>
        
        {!! Form::submit('更新する', ['class'=>'btn btn-primary btn-block mt-3 mb-3']) !!}
        
      {!! Form::close() !!}
    </div>
  </div>

@endsection