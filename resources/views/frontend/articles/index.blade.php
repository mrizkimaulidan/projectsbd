@extends('frontend.layouts.app')

@section('content')
<section id="search-bar">
  <div class="container" style="padding-top: 100px;">
    <h2 class="text-center fw-bold text-uppercase">Daftar Seluruh Artikel</h2>
    <div class="input-group pt-5 mb-3">
      <input type="text" class="form-control" placeholder="Masukkan keyword pencarian.." autofocus>

      <button class="btn btn-secondary" type="button" id="button-addon2">
        <i class="bi bi-search"></i> Cari
      </button>
    </div>
  </div>
</section>

<section id="articles" data-aos="zoom-in-up" data-aos-duration="3000">
  <div class="container">
    <div class="row row-cols-1 row-cols-md-3 g-4 mt-3">
      @foreach ($articles as $article)
      <a href="{{ route('frontend.articles.show', $article) }}" class="text-decoration-none text-dark">
        <div class="col">
          <div class="card blog h-100">
            <img src="{{ asset('storage/articles/' . $article->thumbnail) }}" class="card-img-top"
              alt="{{ $article->title }}">
            <div class="card-body">
              <small class="text-muted"><i class="bi bi-person-circle text-success"></i> {{ $article->user->name
                }}</small>
              <div class="float-end">
                <small class="text-muted"><i class="bi bi-clock text-success"></i> {{ date('d-m-Y',
                  strtotime($article->published_at)) }}</small>
              </div>
              <h5 class="card-title pt-2">{{ str()->limit($article->title, 50) }}</h5>
              <p class="card-text">{!! str()->limit($article->body, 50) !!}</p>
            </div>
            <div class="card-footer">
              <div class="float-end">
                <small class="text-muted"><i class="bi bi-eye-fill text-success"></i> {{ $article->views }}</small>
              </div>
              <small class="read-more">
                <i class="bi bi-chevron-double-right"></i>
                Lihat selengkapnya..</small>
            </div>
          </div>
        </div>
      </a>
      @endforeach
    </div>
    @if($articles->isEmpty())
    <div class="d-flex justify-content-center">
      <div class="text-uppercase text-danger fw-bold">Daftar Artikel Masih Kosong</div>
    </div>
    @endif

    <div class="pt-3 d-flex justify-content-center">
      {{ $articles->links('pagination::bootstrap-5') }}
    </div>
  </div>
</section>
@endsection
