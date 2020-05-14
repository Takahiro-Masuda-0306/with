<div class="modal fade" id="comment_edit_modal_{{ $comment->id }}" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4>コメントを編集</h4>
      </div>
      <div class="modal-body">
      {!! Form::open(['route'=>['comments.update', 'id'=>$comment->post_id], 'method'=>'put']) !!}
        <div class="form-group">
          {!! Form::label('content', 'コメント内容', ['class'=>'font-weight-bold mb-2']) !!}
          {!! Form::textarea('content', $comment->content, ['class'=>'form-control', 'rows'=>'5']) !!}
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">キャンセル</button>
          {!! Form::submit('更新する', ['class'=>'btn btn-success']) !!} 
      </div>
      {!! Form::close() !!}
    </div>
  </div>
</div>