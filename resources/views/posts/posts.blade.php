@if(count($posts) > 0)

  @foreach($posts as $post)
  
  <ul class="list-unstyled">
    <li>
      <div class="row">
        <div class="col-sm-6">
          <p class="mb-3 text-center">{{$post->user->name}}</p>
        </div>
        <div class="col-sm-6 text-center">
          <p class="mb-3 text-center">{{$post->created_at}}</p>
        </div>
      </div>   
      
      <div class="row">
        <div class="col-sm-8">
          <img src="{{ asset('/storage/'.$post->image) }}">
        </div>
        <div class="col-sm-4 text-center">
          <p class="mb-3">{{$post->title}}</p>
          <p class="mb-3">{{$post->description}}</p>
        </div>
      </div>   
      
      <div class="row">
        <div class="col-sm-6 text-center">
          <p class="mb-3">
          @include('favorites.favorites_button', ['post'=>$post])
          いいね数</p>
        </div>
        <div class="col-sm-6 text-center">
          <p class="mb-3"><i class="far fa-comment mr-1"></i>コメント数</p>
        </div>
      </div> 
    </li>
  </ul>
    
  {{ $posts->links('pagination::bootstrap-4') }}
    
  
  @endforeach

@endif