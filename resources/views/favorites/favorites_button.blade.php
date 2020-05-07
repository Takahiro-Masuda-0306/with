@if(\Auth::user()->is_approving($post->id))

{!! Form::open(['route'=>['favorites.disapprove', $post->id], 'method'=>'delete']) !!}

  <button type="submit" class="btn-square-so-pop">
    いいね<i class="fas fa-thumbs-up"></i>
  </button>

{!! Form::close() !!}

@else

{!! Form::open(['route'=>['favorites.approve', $post->id], 'method'=>'post']) !!}

  <button type="submit" class="btn-square-so-pop">
    いいね<i class="far fa-thumbs-up"></i>
  </button>

{!! Form::close() !!}

@endif