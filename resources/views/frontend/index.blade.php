@extends('frontend.layouts.app')

@section('content')
<section id="carousel">
  <div class="container" style="padding-top: 64px;">
    <div class="row" data-aos="zoom-in" data-aos-duration="1000">
      <div class="col-lg-8">
        <div class="card px-3 py-3 shadow">
          <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-indicators">
              @foreach ($sliders as $slider)
              <button type="button" data-bs-target="#carouselExampleCaptions"
                data-bs-slide-to="{{ ($loop->iteration - 1) }}" class="{{ $loop->iteration === 1 ? 'active' : '' }}"
                aria-current="true" aria-label="Slide {{ $loop->iteration }}"></button>
              @endforeach
            </div>
            <div class="carousel-inner">
              @forelse ($sliders as $slider)
              <div class="carousel-item {{ $loop->iteration === 1 ? 'active' : '' }}">
                <img src="{{ asset('storage/sliders/' . $slider->image) }}" class="d-block w-100 slider-image"
                  height="400px" alt="{{ $slider->title }}">
                <div class="carousel-caption d-none d-md-block">
                  <h5>{{ $slider->title }}</h5>
                  <p>{{ $slider->description }}</p>
                </div>
              </div>
              @empty
              <div class="text-center">
                <div class="text-uppercase text-danger fw-bold">Daftar Slider Kosong</div>
              </div>
              @endforelse
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions"
              data-bs-slide="prev">
              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions"
              data-bs-slide="next">
              <span class="carousel-control-next-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Next</span>
            </button>
          </div>
        </div>
      </div>

      <div class="col-lg-4">
        <div class="card" data-aos="fade-left" data-aos-duration="1000">
          <div class="card-body">
            <h4>Informasi Terbaru</h4>
            <hr>
            @forelse ($articleLimit2 as $article)
            <a href="{{ route('frontend.articles.show', $article) }}" class="text-decoration-none text-dark">
              <div class="card blog my-2">
                <img src="{{ asset('storage/articles/' . $article->thumbnail) }}" class="card-img-top"
                  alt="{{ $article->title }}">
                <div class="card-body">
                  <h5 class="card-title">{{ str()->limit($article->title, 50) }}</h5>
                  <p class="card-text">{!! str()->limit($article->body, 50) !!}</p>
                </div>
              </div>
            </a>
            @empty
            <div class="text-center">
              <div class="text-uppercase text-danger fw-bold">Daftar Informasi Kosong</div>
            </div>
            @endforelse
          </div>
        </div>
      </div>
    </div>
    <hr>
  </div>
</section>

<section id="articles" data-aos="zoom-in-up" data-aos-duration="3000">
  <div class="container">
    <h2 class="text-center pb-4">Artikel</h2>
    <div class="row row-cols-1 row-cols-md-3 g-4 mt-3">
      @foreach ($articles as $article)
      <a href="{{ route('frontend.articles.show', $article) }}" class="text-decoration-none text-dark">
        <div class="col">
          <div class="card blog h-100">
            <img src="{{ asset('storage/articles/' . $article->thumbnail) }}" class="card-img-top img-thumbnail"
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

    <div class="text-center py-5">
      <a href="{{ route('frontend.articles.index') }}" class="btn btn-primary">Lihat Seluruh Artikel</a>
    </div>
  </div>
</section>

<section id="galleries" data-aos="zoom-in-up" data-aos-duration="3000">
  <div class="container">
    <div class="row">
      <h2 class="text-center pb-4">Galeri</h2>
      @foreach ($galleries as $gallery)
      <div class="col-lg-3">
        <div data-src="{{ asset('storage/galleries/' . $gallery->image) }}" class="item"
          data-sub-html="<h4>{{ $gallery->title }}</h4><p>{{ $gallery->description }}</p>">
          <img src="{{ asset('storage/galleries/' . $gallery->image) }}" class="img-thumbnail" />
        </div>
      </div>
      @endforeach
    </div>
    @if($galleries->isEmpty())
    <div class="d-flex justify-content-center">
      <div class="text-uppercase text-danger fw-bold">Daftar Galeri Masih Kosong</div>
    </div>
    @endif

    <div class="text-center py-5">
      <a href="{{ route('frontend.galleries.index') }}" class="btn btn-primary">Lihat Seluruh Galeri</a>
    </div>
  </div>
</section>
@endsection
