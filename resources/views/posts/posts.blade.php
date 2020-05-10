@if(count($posts) > 0)

  @foreach($posts as $post)
  
  <ul class="list-unstyled">
    <li class="pt-4 pb-4 bg-white rounded">
      <div class="row mb-3">
        <div class="col-sm-8 offset-sm-2">
          @if($post->user->image) 
            <img class="rounded-circle img-fluid" width="70px" height="70px" src="{{ secure_asset('storage/' . $post->user->image) }}">
          @else 
            <img class="rounded-circle img-fluid" width="70px" height="70px" src="{{ secure_asset('storage/no-image.jpg') }}">
          @endif
          <span class="mb-2 ml-2">{{$post->user->name}}</span>
        </div>
      </div>   
      
      <div class="row">
        <div class="col-sm-8 offset-sm-2">
          <p class="mb-3 font-weight-bold h3">{{$post->title}}</p>
          <p class="mb-3 font-weight-normal h4">{{$post->description}}</p>
        </div>
      </div>
        
      <div class="row mb-3 pb-3 border-bottom">
        <div class="col-sm-8 offset-sm-2">
          <img class="rounded img-fluid" width="500px" height="500px" src="{{ secure_asset('storage/' . $post->image) }}">
          <p class="mb-3 mt-1">{{ $post->created_at }}</p>
        </div>
      </div>
      
      <div class="row mt-3 mb-3 pb-3 border-bottom">
        <div class="col-sm-8 offset-sm-2 d-flex flex-row justify-content-between">
          <p class="mb-3">
            @include('favorites.favorites_button', ['post' => $post])
            {{ $post->count_approvers() }}
          </p>
          <p class="mb-3">
            @include('comments.comment_button', ['post' => $post])
            {{ $post->count_commenters() }}
          </p>
        </div>
      </div> 
      
      <div class="row pb-3 mb-3">
        <div class="col-sm-6 offset-sm-3">
          {!! link_to_route('posts.show', '詳細を見る', ['id' => $post->id], ['class' => 'btn btn-success btn-block']) !!}
        </div>
      </div>
    </li>
  </ul>
    
  {{ $posts->links('pagination::bootstrap-4') }}
    
  
  @endforeach

@endif