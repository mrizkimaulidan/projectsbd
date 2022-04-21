@extends('backend.layouts.app', ['title' => 'Daftar Slider'])

@section('content')
<div class="row">
  <div class="col-lg-12">
    <div class="card">
      <div class="card-body">
        @include('utilities.alert')
        <div class="d-flex justify-content-end pb-2">
          <a href="{{ route('backend.sliders.create') }}" class="btn btn-primary">
            <i class="fas fa-plus"></i> Tambah Data
          </a>
        </div>
        <div class="table-responsive">
          <table class="table">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Judul</th>
                <th scope="col">Gambar</th>
                <th scope="col">Status</th>
                <th scope="col">Aksi</th>
              </tr>
            </thead>
            <tbody>
              @forelse ($sliders as $slider)
              <tr>
                <th scope="row">{{ $loop->iteration }}</th>
                <td>{{ str()->limit($slider->title, 50) }}</td>
                <td>
                  <a href="{{ asset('storage/sliders/' . $slider->image) }}" data-lightbox="image">
                    <img src="{{ asset('storage/sliders/' . $slider->image) }}" width="200px" class="img-thumbnail" alt="{{
                      $slider->title }}">
                  </a>
                </td>
                <td>
                  <span class="badge badge-{{ $slider->is_active ? 'success' : 'danger' }}">
                    {{ $slider->is_active ? 'Aktif' : 'Tidak Aktif' }}
                  </span>
                </td>
                <td>
                  <div class="btn-group" role="group">
                    <a href="{{ route('backend.sliders.edit', $slider) }}" class="btn btn-sm btn-success">
                      <i class="fas fa-edit"></i>
                    </a>

                    <form action="{{ route('backend.sliders.destroy', $slider) }}" method="POST">
                      @csrf
                      @method('DELETE')
                      <button type="submit" class="btn btn-sm btn-danger delete">
                        <i class="fas fa-trash-alt"></i>
                      </button>
                    </form>
                  </div>
                </td>
              </tr>
              @empty
              <td colspan="5" class="text-center">
                <div class="fw-bold text-danger text-uppercase">Kosong!</div>
              </td>
              @endforelse
            </tbody>
          </table>
        </div>
        {{ $sliders->links('pagination::bootstrap-5') }}
      </div>
    </div>
  </div>
</div>
@endsection
