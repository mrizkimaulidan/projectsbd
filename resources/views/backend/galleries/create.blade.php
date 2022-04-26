@extends('backend.layouts.app', ['title' => 'Tambah Galeri'])

@section('content')
<div class="row">
  <div class="col-lg-12">
    <div class="card">
      <div class="card-body">
        @include('utilities.alert')
        <form action="{{ route('backend.galleries.store') }}" method="POST" enctype="multipart/form-data">
          @csrf
          <div class="mb-3">
            <label for="title" class="form-label">Judul :</label>
            <input type="text" name="title" id="title" value="{{ old('title') }}" class="form-control"
              placeholder="Masukkan judul.." autofocus>
          </div>

          <div class="row">
            <div class="col-lg-6">
              <div class="mb-3">
                <label for="description" class="form-label">Deskripsi :</label>
                <textarea name="description" id="description" value="{{ old('description') }}" class="form-control"
                  rows="3" placeholder="Masukkan deskripsi.."></textarea>
              </div>
            </div>
            <div class="col-lg-6">
              <div class="mb-3">
                <label for="is_active">Aktif/Tidak Aktif :</label>
                <select name="is_active" id="is_active" class="form-select">
                  <option value="">Pilih..</option>
                  <option value="1" @selected(old('is_active')==1)>Aktif</option>
                  <option value="0" @selected(old('is_active')==0)>Tidak Aktif</option>
                </select>
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-lg-6">
              <div class="mb-3">
                <label for="image" class="form-label">Pilih Gambar :</label>
                <input type="file" name="image" id="image" class="form-control"
                  oninput="image_preview.src=window.URL.createObjectURL(this.files[0])">
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
          <a href="{{ route('backend.galleries.index') }}" class="btn btn-secondary">Kembali</a>
          <button type="submit" class="btn btn-primary">Tambah</button>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection