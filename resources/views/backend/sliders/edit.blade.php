@extends('backend.layouts.app', ['title' => 'Ubah Slider'])

@section('content')
<div class="row">
  <div class="col-lg-12">
    <div class="card">
      <div class="card-body">
        <form action="{{ route('backend.sliders.update', $slider) }}" method="POST" enctype="multipart/form-data">
          @csrf
          @method('PUT')
          <div class="mb-3">
            <label for="title" class="form-label">Judul :</label>
            <input type="text" name="title" id="title" value="{{ $slider->title }}"
              class="form-control @error('title') is-invalid @enderror" placeholder="Masukkan judul.." autofocus>
            @error('title')
            <small class="text-danger">{{ $errors->first('title') }}</small>
            @enderror
          </div>

          <div class="row">
            <div class="col-lg-6">
              <div class="mb-3">
                <label for="description" class="form-label">Deskripsi :</label>
                <textarea name="description" id="description"
                  class="form-control @error('description') is-invalid @enderror" rows="3"
                  placeholder="Masukkan deskripsi..">{{ $slider->description }}</textarea>
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
                  <option value="1" {{ $slider->is_active === 1 ? 'selected' : ''}}>Aktif</option>
                  <option value="0" {{ $slider->is_active === 0 ? 'selected' : ''}}>Tidak Aktif</option>
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