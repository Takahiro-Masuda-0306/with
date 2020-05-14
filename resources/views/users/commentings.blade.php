@extends('layouts.app')

@section('content')

  <div class="text-center mb-4">
    <p>{{$user->name}}さんのコメント一覧 <span class="badge badge-secondary ml-2">{{ $count_comments }}</span></p>
  </div>
  
  @if(count($comments) > 0 )

  @foreach($comments as $comment)
    
    <ul class="list-unstyled">
      <li class="mb-3 bg-white rounded">
        <div class="row">
          <div class="col-sm-8 offset-sm-2 d-flex flex-row justify-content-between">
            
            <p class="text-secondary">
              @if($comment->user->image) 
                <img class="rounded-circle img-fluid mr-2" width="50px" height="50px" src="{{ secure_asset('storage/' . $comment->user->image) }}">
              @else 
                <img class="rounded-circle img-fluid mr-2" width="50px" height="50px" src="{{ secure_asset('storage/no-image.jpg') }}">
              @endif
              
              {{ $comment->user->name }}
            </p>
            <p class="text-secondary ml-4">{{ $comment->created_at }}</p>
          </div>
        </div>
        
        <div class="row">
          <div class="col-sm-8 offset-sm-2 d-flex flex-row justify-content-between">
            <p>{{ link_to_route('posts.show', $comment->content, ['id'=>$comment->post_id]) }}</p>
            
            @if(\Auth::id() === $comment->user_id)
              <div class="dropdown text-right" id="comment_dropdown_{{ $comment->id }}">
                <button type="button" class="btn dropdown-toggle" data-toggle="dropdown">
                  <i class="fas fa-ellipsis-h"></i>
                </button>
                <div class="dropdown-menu">
                  <a class="dropdown-item" href="#" data-toggle="modal" data-target="#comment_edit_modal_{{ $comment->id }}">編集する</a>
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item" href="#" data-toggle="modal" data-target="#comment_delete_modal_{{ $comment->id }}">削除する</a>
                </div>
              </div>
              @include('commons.comment_edit_modal', ['comment'=>$comment])
              @include('commons.comment_delete_modal', ['comment'=>$comment])
            @endif
            
          </div>
        </div>
      </li>
    </ul>
    
    {{ $comments->links('pagination::bootstrap-4') }}
    
  @endforeach

@else

  <h4 class="text-center text-secondary">No comments</h4>  

@endif


@endsection