@extends('backend.layouts.app', ['title' => 'Tambah Slider'])

@section('content')
<div class="row">
  <div class="col-lg-12">
    <div class="card">
      <div class="card-body">
        <form action="{{ route('backend.sliders.store') }}" method="POST" enctype="multipart/form-data">
          @csrf
          <div class="mb-3">
            <label for="title" class="form-label">Judul :</label>
            <input type="text" name="title" id="title" value="{{ old('title') }}"
              class="form-control @error('title') is-invalid @enderror" placeholder="Masukkan judul.." autofocus>
            @error('title')
            <small class="text-danger">{{ $errors->first('title') }}</small>
            @enderror
          </div>

          <div class="row">
            <div class="col-lg-6">
              <div class="mb-3">
                <label for="description" class="form-label">Deskripsi :</label>
                <textarea name="description" id="description" value="{{ old('description') }}"
                  class="form-control @error('description') is-invalid @enderror" rows="3"
                  placeholder="Masukkan deskripsi.."></textarea>
                @error('description')
                <small class="text-danger">{{ $errors->first('description') }}</small>
                @enderror
              </div>
            </div>
            <div class="col-lg-6">
              <div class="mb-3">
                <label for="is_active">Aktif/Tidak Aktif :</label>
                <select name="is_active" id="is_active" class="form-select @error('is_active') is-invalid @enderror">
                  <option value="">Pilih..</option>
                  <option value="1">Aktif</option>
                  <option value="0">Tidak Aktif</option>
                </select>
                @error('is_active')
                <small class="text-danger">{{ $errors->first('is_active') }}</small>
                @enderror
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-lg-6">
              <div class="mb-3">
                <label for="image" class="form-label">Pilih Gambar :</label>
                <input type="file" name="image" id="image" class="form-control @error('image') is-invalid @enderror"
                  oninput="image_preview.src=window.URL.createObjectURL(this.files[0])">
                @error('image')
                <small class="text-danger">{{ $errors->first('image') }}</small><br>
                @enderror
                <small class="text-muted">*Ekstensi yang diperbolehkan jpg/png/jpeg</small><br>
                <small class="text-muted">*Ukuran gambar maksimal 2mb!</small>
              </div>
            </div>

            <div class="col-lg-6">
              <div class="card">
                <div class="card-body">
                  <img height="100px" class="img-fluid rounded" id="image_preview">
                </div>
              </div>
            </div>
          </div>
          <a href="{{ route('backend.sliders.index') }}" class="btn btn-secondary">Kembali</a>
          <button type="submit" class="btn btn-primary">Tambah</button>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection