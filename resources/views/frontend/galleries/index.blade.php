@extends('frontend.layouts.app')

@section('content')
<section id="title">
  <div class="container" style="padding-top: 100px;">
    <h2 class="text-center fw-bold text-uppercase">Daftar Seluruh Galeri</h2>
  </div>
</section>

<section id="galleries" data-aos="zoom-in-up" data-aos-duration="3000">
  <div class="container pt-5">
    <div class="row">
      @foreach ($galleries as $gallery)
      <div class="col-lg-3">
        <div data-src="{{ asset('storage/galleries/' . $gallery->image) }}" class="item"
          data-sub-html="<h4>{{ $gallery->title }}</h4><p>{{ $gallery->description }}</p>">
          <img src="{{ asset('storage/galleries/' . $gallery->image) }}" class="my-2 img-thumbnail" />
        </div>
      </div>
      @endforeach
    </div>
  </div>
  @if($galleries->isEmpty())
  <div class="d-flex justify-content-center">
    <div class="text-uppercase text-danger fw-bold">Daftar Galeri Masih Kosong</div>
  </div>
  @endif
  <div class="pt-3 d-flex justify-content-center">
    {{ $galleries->links('pagination::bootstrap-5') }}
  </div>
</section>
@endsection
