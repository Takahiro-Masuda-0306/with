<div class="modal fade" id="image_modal_{{ $post->id }}" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="btn btn-default text-right" data-dismiss="modal"><i class="far fa-window-close"></i></button>
      </div>
      <div class="modal-body">
        <img class="rounded img-fluid" width="700px" height="700px" src="{{ secure_asset('storage/' . $post->image) }}">
      </div>
      <div class="modal-footer">
        
      </div>
    </div>
  </div>
</div>