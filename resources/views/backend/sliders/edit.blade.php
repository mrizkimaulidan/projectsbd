@extends('backend.layouts.app', ['title' => 'Ubah Slider ' . $slider->title])

@section('content')
<div class="row">
  <div class="col-lg-12">
    <div class="card">
      <div class="card-body">
        @include('utilities.alert')
        <form action="{{ route('backend.sliders.update', $slider) }}" method="POST" enctype="multipart/form-data">
          @csrf
          @method('PUT')
          <div class="mb-3">
            <label for="title" class="form-label">Judul :</label>
            <input type="text" name="title" id="title" value="{{ $slider->title }}" class="form-control"
              placeholder="Masukkan judul.." autofocus>
          </div>

          <div class="row">
            <div class="col-lg-6">
              <div class="mb-3">
                <label for="description" class="form-label">Deskripsi :</label>
                <textarea name="description" id="description" class="form-control" rows="3"
                  placeholder="Masukkan deskripsi..">{{ $slider->description }}</textarea>
              </div>
            </div>
            <div class="col-lg-6">
              <div class="mb-3">
                <label for="is_active">Aktif/Tidak Aktif :</label>
                <select name="is_active" id="is_active" class="form-select">
                  <option value="">Pilih..</option>
                  <option value="1" {{ $slider->is_active === 1 ? 'selected' : ''}}>Aktif</option>
                  <option value="0" {{ $slider->is_active === 0 ? 'selected' : ''}}>Tidak Aktif</option>
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
                  <a href="{{ asset('storage/sliders/' . $slider->image) }}" data-lightbox="image">
                    <img src="{{ asset('storage/sliders/' . $slider->image) }}" height="100px" class="img-fluid rounded"
                      alt="{{ $slider->title }}" id="image_preview">
                  </a>
                </div>
              </div>
            </div>
          </div>
          <a href="{{ route('backend.sliders.index') }}" class="btn btn-secondary">Kembali</a>
          <button type="submit" class="btn btn-primary">Ubah</button>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection
