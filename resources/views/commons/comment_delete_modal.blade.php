<div class="modal fade" id="comment_delete_modal_{{ $comment->id }}" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4>本当に削除しますか？</h4>
      </div>
      <div class="modal-body">
        <label>{{ $comment->content }}</label>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">キャンセル</button>
          {!! link_to_route('comments.delete', '削除する', ['id'=>$comment->id], ['class'=>'btn btn-danger']) !!} 
      </div>
    </div>
  </div>
</div>