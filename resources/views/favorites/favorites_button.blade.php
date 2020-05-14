@if(\Auth::user()->is_approving($post->id))

  <a class="btn btn-lg" href="{!! route('favorites.disapprove', ['id'=>$post->id]) !!}">
    <i class="fas fa-thumbs-up"></i>
  </a>

@else

  <a class="btn btn-lg" href="{!! route('favorites.approve', ['id'=>$post->id]) !!}">
    <i class="far fa-thumbs-up"></i>
  </a>

@endif