@if (session('danger'))
  <div class="danger alert alert-danger">
    {{ session('danger') }}
  </div>
@endif