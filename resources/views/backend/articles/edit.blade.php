@extends('backend.layouts.app', ['title' => 'Ubah Artikel'])

@section('content')
<div class="row">
  <div class="col-lg-12">
    <div class="card">
      <div class="card-body">
        <form action="{{ route('backend.articles.update', $article) }}" method="POST" enctype="multipart/form-data">
          @csrf
          @method('PUT')
          <div class="mb-3">
            <label for="title" class="form-label">Judul :</label>
            <input type="text" name="title" id="title" class="form-control @error('title') is-invalid @enderror"
              placeholder="Masukkan judul.." value="{{ $article->title }}" autofocus>
            @error('title')
            <small class="text-danger">{{ $errors->first('title') }}</small>
            @enderror
          </div>

          <div class="row">
            <div class="col-lg-6">
              <div class="mb-3">
                <label for="is_active">Aktif/Tidak Aktif :</label>
                <select name="is_active" id="is_active" class="form-select @error('is_active') is-invalid @enderror">
                  <option value="" selected>Pilih..</option>
                  <option value="1" {{ $article->is_active === 1 ? 'selected' : '' }}>Aktif</option>
                  <option value="0" {{ $article->is_active === 0 ? 'selected' : '' }}>Tidak Aktif</option>
                </select>
                @error('is_active')
                <small class="text-danger">{{ $errors->first('is_active') }}</small>
                @enderror
              </div>
            </div>

            <div class="col-lg-6">
              <label for="image_preview" class="form-label">Preview Thumbnail :</label>
              <div class="card">
                <div class="card-body">
                  <a href="{{ asset('storage/articles/' . $article->thumbnail) }}" data-lightbox="image">
                    <img src="{{ asset('storage/articles/' . $article->thumbnail) }}" data-lightbox="image"
                      height="100px" class="img-fluid rounded" id="image_preview" alt="{{ $article->title }}">
                  </a>
                </div>
              </div>
            </div>
          </div>

          <div class="mb-3">
            <label for="thumbnail" class="form-label">Pilih Gambar :</label>
            <input type="file" name="thumbnail" id="thumbnail"
              class="form-control @error('thumbnail') is-invalid @enderror"
              oninput="image_preview.src=window.URL.createObjectURL(this.files[0])">
            @error('thumbnail')
            <small class="text-danger">{{ $errors->first('thumbnail') }}</small><br>
            @enderror
            <small class="text-muted">*Ekstensi yang diperbolehkan jpg/png/jpeg</small><br>
            <small class="text-muted">*Ukuran gambar maksimal 2mb!</small>
          </div>

          <div class="mb-3">
            <label for="body" class="form-label">Konten :</label>
            <textarea name="body" id="body" rows="5" class="form-control @error('body') is-invalid @enderror"
              placeholder="Masukkan konten..">{{ $article->body }}</textarea>
            @error('body')
            <small class="text-danger">{{ $errors->first('body') }}</small>
            @enderror
          </div>
          <a href="{{ route('backend.articles.index') }}" class="btn btn-secondary">Kembali</a>
          <button type="submit" class="btn btn-primary">Ubah</button>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection

@push('js')
@include('backend.articles.script')
@endpush