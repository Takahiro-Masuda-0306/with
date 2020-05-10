@if(count($comments) > 0 )

  @foreach($comments as $comment)
    
    <ul class="list-unstyled">
      <li class="mb-3">
        <div class="row">
          <div class="col-sm-8 offset-sm-2 d-flex flex-row justify-content-start">
            <p class="text-secondary">{{ $comment->user->name }}</p>
            <p class="text-secondary ml-4">{{ $comment->created_at }}</p>
          </div>
        </div>
        
        <div class="row">
          <div class="col-sm-8 offset-sm-2">
            {{ $comment->content }}
          </div>
        </div>
        
        @if(\Auth::id() === $comment->id)
        <div class="col-sm-4">
          {!! link_to_route('comments.delete', '削除する', ['id'=>$comment->post_id], ['onclick'=>'return myFunction()']) !!} 
        </div>
        @endif
          
        </div>
      </li>
    </ul>
    
    {{ $comments->links('pagination::bootstrap-4') }}
    
    <script>
      function myFunction() {
        if(!confirm("本当に削除しますか？"))
        event.preventDefault();
      }
    </script>
    
  @endforeach

@else

  <h4 class="text-center text-secondary">No comments</h4>  

@endif
