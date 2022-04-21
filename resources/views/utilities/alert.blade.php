@if(session('success'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
  <strong>Berhasil!</strong> {{ session('success') }}
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
@endif

@if($errors->any())
<div class="alert alert-danger alert-dismissible fade show" role="alert">
  <h4>
    <i class="fas fa-exclamation-triangle"></i>
    Perhatian!
  </h4>
  @foreach ($errors->all() as $error)
  <ul>
    <li>{{ $error }}</li>
  </ul>
  @endforeach
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
@endif
