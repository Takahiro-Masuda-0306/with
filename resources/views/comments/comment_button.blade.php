@if(Auth::user()->is_commenting($post->id)) 

  <a href="{!! route('posts.show', ['id'=>$post->id]) !!}">
    <i class="fas fa-comment"></i>
  </a>

@else

  <a href="{!! route('posts.show', ['id'=>$post->id]) !!}">
    <i class="far fa-comment"></i>
  </a>

@endif