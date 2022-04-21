@extends('frontend.layouts.app')

@section('content')
<section id="articles">
  <div class="container" style="padding-top: 64px;">
    <div class="row">
      <div class="col-lg-8">
        <article data-aos="zoom-in" data-aos-duration="1000">
          <img src="{{ asset('storage/articles/' . $article->thumbnail) }}" class="img-fluid" alt="">
          <div class="title">
            <h5 class="fw-bold pt-3">{{ $article->title }}</h5>
            <small class="text-muted"><i class="bi bi-person-circle"></i> {{ $article->users->name }}</small>
            <small class="text-muted"><i class="bi bi-clock"></i> {{ date('d-m-Y', strtotime($article->published_at))
              }}</small>

            <div class="float-end">
              <small class="text-muted"><i class="bi bi-eye"></i> {{ $article->views }}</small>
            </div>
          </div>

          <hr>

          <div class="body">
            {!! $article->body !!}
          </div>
        </article>
      </div>

      <div class="col-lg-4">
        <div class="card sticky-top" data-aos="fade-left" data-aos-duration="1000">
          <div class="card-body">
            <h4>Baca Juga</h4>
            <hr>
            <div class="splide" aria-label="Basic Structure Example">
              <div class="splide__track">
                <div class="splide__list">
                  @foreach ($randomArticles as $article)
                  <li class="splide__slide">
                    <div class="card">
                      <img src="{{ asset('storage/articles/' . $article->thumbnail) }}" class="card-img-top"
                        alt="{{ $article->title }}">
                      <div class="card-body">
                        <h5 class="card-title">{{ str()->limit($article->title, 50) }}</h5>
                        <p class="card-text">{!! $article->body !!}</p>

                        <a href="{{ route('frontend.articles.show', $article) }}"
                          class="text-decoration-none text-dark">
                          <small class="read-more">
                            <i class="bi bi-chevron-double-right"></i>
                            Lihat selengkapnya..
                          </small>
                        </a>
                      </div>
                    </div>
                  </li>
                  @endforeach
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<section id="comments">
  <div class="container pt-5">
    <div class="card">
      <div class="card-header">
        Daftar Komentar
      </div>
      <div class="card-body">
        <div class="row" data-aos="fade-up" data-aos-duration="3000">
          <div style="height: 500px; overflow-y: scroll;">
            @forelse ($article->comments()->where('is_verified', 1)->orderBy('date')->get() as $comment)
            <div class="border px-3 py-3 my-2" style="border: 10px solid black;">
              <div class="fw-bold">
                <i class="bi bi-person-circle"></i>
                {{ $comment->name }}
              </div>
              <div>{{ $comment->body }}</div>

              <div class="d-flex justify-content-end pt-3">
                <small class="opacity-75">
                  <i class="bi bi-calendar pe-1"></i>
                  {{ date('l, d F Y', strtotime($comment->date)) }}
                </small>
              </div>
            </div>
            @empty
            <div>Belum ada Komentar</div>
            @endforelse
          </div>
          <small class="pt-3">
            <caption>Total {{ $article->comments()->where('is_verified', 1)->sum('is_verified') }} Komentar</caption>
          </small>
          <hr>
        </div>

        <div class="row justify-content-center" data-aos="fade-up" data-aos-duration="3000">
          <div class="col-lg-6">

            <div id="error"></div>

            <form action="{{ route('frontend.comments.store') }}" method="POST" id="comment-form">
              @csrf
              <input type="hidden" value="{{ $article->id }}" id="article_id">
              <div class="mb-3">
                <label for="name" class="form-label">Masukkan nama :</label>
                <input type="text" class="form-control" name="name" id="name" placeholder="Masukkan nama..">
              </div>
              <div class="mb-3">
                <label for="email" class="form-label">Masukkan alamat email :</label>
                <input type="email" class="form-control" name="email" id="email" placeholder="Masukkan alamat email..">
              </div>
              <div class="mb-3">
                <label for="body" class="form-label">Komentar :</label>
                <textarea class="form-control" name="body" id="body" rows="3"
                  placeholder="Masukkan komentar.."></textarea>
              </div>

              <div class="text-center">
                <button type="submit" class="btn btn-primary">Submit</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
@endsection

@push('js')
@include('frontend.articles.script')

<script>
  document.addEventListener('DOMContentLoaded', function () {
    let splide = new Splide('.splide', {
      autoScroll: {
        speed: 2
      }
    });

    splide.mount();
  });
</script>
@endpush
