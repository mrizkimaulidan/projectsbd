@extends('backend.layouts.app', ['title' => 'Tambah Artikel'])

@section('content')
<div class="row">
  <div class="col-lg-12">
    <div class="card">
      <div class="card-body">
        <form action="{{ route('backend.articles.store') }}" method="POST" enctype="multipart/form-data">
          @csrf
          <div class="row">
            <div class="col-lg-6">
              <div class="mb-3">
                <label for="title" class="form-label">Judul :</label>
                <input type="text" name="title" id="title" value="{{ old('title') }}"
                  class="form-control @error('title') is-invalid @enderror" placeholder="Masukkan judul.." autofocus>
                @error('title')
                <small class="text-danger">{{ $errors->first('title') }}</small>
                @enderror
              </div>
            </div>
            <div class="col-lg-6">
              <div class="mb-3">
                <label for="slug" class="form-label">Slug :</label>
                <input type="text" name="slug" id="slug" class="form-control"
                  placeholder="Slug akan terbuat otomatis sesuai dengan judul.." value="{{ old('slug') }}" readonly>
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-lg-6">
              <div class="mb-3">
                <label for="is_active">Aktif/Tidak Aktif :</label>
                <select name="is_active" id="is_active" class="form-select @error('is_active') is-invalid @enderror">
                  <option value="">Pilih..</option>
                  <option value="1" @selected(old('is_active')==="1" )>Aktif</option>
                  <option value="0" @selected(old('is_active')==="0" )>Tidak Aktif</option>
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
                  <img height="100px" class="img-fluid rounded" id="image_preview">
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
            <textarea name="body" id="body" rows="5"
              class="form-control @error('body') is-invalid @enderror">{{ old('body') }}</textarea>
            @error('body')
            <small class="text-danger">{{ $errors->first('body') }}</small>
            @enderror
          </div>
          <a href="{{ route('backend.articles.index') }}" class="btn btn-secondary">Kembali</a>
          <button type="submit" class="btn btn-primary">Tambah</button>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection

@push('js')
@include('backend.articles.script')
@endpush