<div class="modal fade" id="post_modal_{{ $post->id }}" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4>本当に削除しますか？</h4>
      </div>
      <div class="modal-body">
        <label class="font-weight-bold">{{ $post->title }}</label>
        <p>{{ $post->description }}</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">キャンセル</button>
          {!! link_to_route('posts.destroy', '削除する', ['id'=>$post->id], ['class'=>'btn btn-danger']) !!} 
      </div>
    </div>
  </div>
</div>