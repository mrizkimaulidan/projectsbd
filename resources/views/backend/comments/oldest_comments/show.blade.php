@extends('backend.layouts.app', ['title' => 'Detail Komentar'])

@section('content')
<div class="row">
  <div class="col-lg-12">
    <div class="card">
      <div class="card-body">
        @include('utilities.alert')
        <form action="{{ route('backend.comments.oldest-comments.update', $comment) }}" method="POST">
          @csrf
          <div class="row">
            <div class="col-lg-6">
              <div class="mb-3">
                <label for="article_id" class="form-label">Pada Artikel :</label>
                <div>{{ $comment->article->title }}</div>
              </div>
            </div>
            <div class="col-lg-6">
              <div class="mb-3">
                <label for="article_id" class="form-label">Nama dan Email :</label>
                <div>{{ $comment->name }} - {{ $comment->email }}</div>
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-lg-6">
              <div class="mb-3">
                <label for="verified_by" class="form-label">Diverifikasi Oleh :</label>
                <div>
                  <span class="badge badge-{{ is_null($comment->verified_by) ? 'danger' : 'success' }}">{{
                    is_null($comment->verified_by) ? 'Belum Diverifikasi' : $comment->user->name }}</span>
                </div>
              </div>
            </div>
            <div class="col-lg-6">
              <div class="mb-3">
                <label for="is_verified" class="form-label">Status :</label>
                <div>
                  <span class="badge badge-{{ $comment->is_verified ? 'success' : 'danger' }}">{{
                    $comment->is_verified ? 'Sudah Diverifikasi' : 'Belum Diverifikasi' }}</span>
                </div>
              </div>
            </div>
          </div>

          <div class="mb-3">
            <label for="body" class="form-label">Isi Komentar :</label>
            <textarea class="form-control" rows="5" disabled>{{ $comment->body }}</textarea>
          </div>

          <a href="{{ route('backend.comments.oldest-comments.index') }}" class="btn btn-secondary">Kembali</a>

          @if($comment->is_verified)
          <button type="submit" class="btn btn-warning" id="unverify-button">Unverifikasi</button>
          @else
          <a href="{{ route('backend.comments.newest-comments.show', $comment) }}" class="btn btn-success">Pergi ke menu
            Verifikasi Komentar</a>
          @endif
        </form>
      </div>
    </div>
  </div>
</div>
@endsection

@push('js')
@include('backend.comments.oldest_comments.script')
@endpush
