@extends('backend.layouts.app', ['title' => 'Dashboard'])

@section('content')
<div class="row">
  <div class="col-lg-3 col-6">
    <!-- small box -->
    <div class="small-box bg-info">
      <div class="inner">
        <h3>{{ $countArticle }}</h3>

        <p>Jumlah Artikel</p>
      </div>
      <div class="icon">
        <i class="ion ion-bag"></i>
      </div>
      <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
    </div>
  </div>
  <!-- ./col -->
  <div class="col-lg-3 col-6">
    <!-- small box -->
    <div class="small-box bg-success">
      <div class="inner">
        <h3>{{ $countUser }}</h3>

        <p>Jumlah Pengguna</p>
      </div>
      <div class="icon">
        <i class="ion ion-stats-bars"></i>
      </div>
      <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
    </div>
  </div>
  <!-- ./col -->
  <div class="col-lg-3 col-6">
    <!-- small box -->
    <div class="small-box bg-warning">
      <div class="inner">
        <h3>{{ $verifiedComments }}</h3>

        <p>Komentar Sudah Diverifikasi</p>
      </div>
      <div class="icon">
        <i class="ion ion-person-add"></i>
      </div>
      <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
    </div>
  </div>
  <!-- ./col -->
  <div class="col-lg-3 col-6">
    <!-- small box -->
    <div class="small-box bg-danger">
      <div class="inner">
        <h3>{{ $unverifiedComments }}</h3>

        <p>Komentar Belum Diverifikasi</p>
      </div>
      <div class="icon">
        <i class="ion ion-pie-graph"></i>
      </div>
      <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
    </div>
  </div>
</div>

<div class="row">
  <div class="col-lg-6">
    <div class="card">
      <div class="card-header">
        5 Komentar Terbaru (Belum Diverifikasi)
      </div>
      <div class="card-body">
        <div class="accordion" id="accordionNewestComment">
          @forelse ($newestComments as $comment)
          <div class="card">
            <div class="card-header" id="heading{{ $loop->iteration }}">
              <h2 class="mb-0">
                <button class="btn btn-block text-left" type="button" data-toggle="collapse"
                  data-target="#collapse{{ $loop->iteration }}" aria-expanded="true"
                  aria-controls="collapse{{ $loop->iteration }}">
                  <i class="fas fa-comments pe-3"></i>

                  {{ str()->limit($comment->name, 50) }} - {{ str()->limit($comment->email, 50) }}

                  <div class="text-end">
                    <i class="fas fa-calendar"></i>
                    {{ date('d-m-Y', strtotime($comment->date)) }}
                  </div>
                </button>
              </h2>

            </div>

            <div id="collapse{{ $loop->iteration }}" class="collapse" aria-labelledby="heading{{ $loop->iteration }}"
              data-parent="#accordionNewestComment">
              <div class="card-body">
                <h6 class="fw-bold">{{ str()->limit($comment->article->title, 50) }}</h6>

                {{ str()->limit($comment->body, 50) }}
                <div class="pt-3">
                  <a href="{{ route('backend.comments.newest-comments.show', $comment) }}"
                    class="btn btn-success">Detail</a>
                </div>
              </div>
            </div>
          </div>
          @empty
          <td colspan="1" class="text-center">
            <div class="fw-bold text-danger text-uppercase">Kosong!</div>
          </td>
          @endforelse
        </div>
      </div>
    </div>
  </div>

  <div class="col-lg-6">
    <div class="card">
      <div class="card-header">
        5 Artikel Terpopuler
      </div>
      <div class="card-body">
        <table class="table">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">Judul</th>
              <th scope="col">Views</th>
            </tr>
          </thead>
          <tbody>
            @forelse ($popularArticles as $popularArticle)
            <tr>
              <th scope="row">{{ $loop->iteration }}</th>
              <td>{{ str()->limit($popularArticle->title, 50) }}</td>
              <td>{{ $popularArticle->views }}</td>
            </tr>
            @empty
            <td colspan="3" class="text-center">
              <div class="fw-bold text-danger text-uppercase">Kosong!</div>
            </td>
            @endforelse
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
@endsection
